<?php namespace Symposium\ApiResources;

use Illuminate\Contracts\Support\Arrayable;
use User;

class Me implements Arrayable
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getId()
    {
        return $this->user->id;
    }

    public function getType()
    {
        return 'users';
    }

    public function attributes()
    {
        return [
            'email' => $this->user->email,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'created_at' => (string)$this->user->created_at,
            'updated_at' => (string)$this->user->updated_at
        ];
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'attributes' => $this->attributes(),
        ];
    }
}
