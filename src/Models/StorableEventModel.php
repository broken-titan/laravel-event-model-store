<?php

    namespace BrokenTitan\StorableEventModel\Models;

    use Illuminate\Database\Eloquent\Model;

    class StorableEventModel extends Model {
        protected $attributes = [
            "model" => null,
            "model_id" => null,
            "model_type" => null,
            "type" => null
        ];
        protected $fillable = [
            "model",
            "model_id",
            "model_type",
            "type"
        ];
        protected $table = "events";
    }
