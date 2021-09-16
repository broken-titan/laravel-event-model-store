<?php

	namespace BrokenTitan\StorableEventModel\Contracts;

	use Illuminate\Database\Eloquent\Model;

	interface HasStorableModel {
		public function model() : Model;
		public function modelKey() : string;
	}