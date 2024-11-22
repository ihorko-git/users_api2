<?php
namespace App\Entity;

enum AddressStatusEnum: string
{
    case ACTIVE = "active";
    case DISABLE = "disable";
}
