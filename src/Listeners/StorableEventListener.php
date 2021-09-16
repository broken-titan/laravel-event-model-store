<?php

	namespace BrokenTitan\StorableModels\Listeners;

	use App\Contracts\HasStorableModel;
	use App\Models\StorableEventModel;

	class StorableEventModelListener {
		public function handle($event) {
			if ($event instanceof HasModel) {
				$eventClass = $this->eventModel();
				$model = $event->model();
				$eventClass::create([
					"model" => $model->toArray(),
					"model_id" => $event->modelKey(),
					"model_type" => get_class($model),
					"type" => class_basename($event)
				]);
			} else {
				logger()->warn("Tried to save Event but failed because it did not implement App\Contracts\Hasmodel.");
			}
		}

		protected function eventModel() : string {
			return StorableEventModel::class;
		}
	}
