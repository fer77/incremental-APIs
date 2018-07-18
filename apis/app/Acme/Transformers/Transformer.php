<?php namespace Acme\Transformers;

// Made it an abstract class since it will probably be used in diffrent places within the app.
abstract class Transformer {

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    // because every sub class abstracted from here will need to offer a "transform" method and needs to be required here.
    public abstract function transform($item);
}