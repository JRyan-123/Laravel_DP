<?php

namespace App\DTOs;

final class TodoData 
{
    public function __construct(
        public string $title,
        public bool $completed = false,
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            title : $request->title,
            completed : $request->boolean('completed', false)
        );
    }

}
