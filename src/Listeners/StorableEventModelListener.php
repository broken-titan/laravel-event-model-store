<?php

	namespace BrokenTitan\StorableEventModel\Listeners;

	use BrokenTitan\StorableEventModel\Contracts\HasStorableModel;
	use BrokenTitan\StorableEventModel\Models\StorableEventModel;

	class StorableEventModelListener {
		public function handle($event) {
			if ($event instanceof HasStorableModel) {
				$eventClass = $this->eventModel();
				$model = $event->model();
				$eventClass::create([
					"model" => $model->toArray(),
					"model_id" => $event->modelKey(),
					"model_type" => get_class($model),
					"type" => class_basename($event)
				]);
			} else {
				logger()->warning("Tried to save Event but failed because it did not implement HasStorableModel.");
			}
		}

		protected function eventModel() : string {
			return StorableEventModel::class;
		}
	}
