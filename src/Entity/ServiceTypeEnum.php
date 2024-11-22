<?php
namespace App\Entity;

enum ServiceTypeEnum: string
{
    case INTERNET = "internet";
    case TV = "tv";
    case IP = "ip";
}
