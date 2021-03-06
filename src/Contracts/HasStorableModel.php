<?php

	namespace BrokenTitan\StorableEventModel\Contracts;

	use Illuminate\Database\Eloquent\Model;

	interface HasStorableModel {
		public function storableModel() : Model;
		public function storableData() : array;
	}
