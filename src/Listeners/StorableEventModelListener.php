<?php

	namespace BrokenTitan\StorableEventModel\Listeners;

	use BrokenTitan\StorableEventModel\Contracts\HasStorableModel;
	use BrokenTitan\StorableEventModel\Models\StorableEventModel;

	class StorableEventModelListener {
		public function handle($event) {
			if ($event instanceof HasStorableModel) {
				$eventClass = $this->eventModel();
				$eventClass::create([
					"data" => $event->storableData(),
					"model_id" => $event->storableModelKey(),
					"model_type" => get_class($event->storableModel()),
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
