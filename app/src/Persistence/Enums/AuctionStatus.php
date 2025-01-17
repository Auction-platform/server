<?php

namespace App\Persistence\Enums;

enum AuctionStatus: string
{
    case PENDING = "pending";
    case ACTIVE = 'active';
    case SOLD = 'sold';
    case UNSOLD = 'unsold';
    case CANCELLED = 'cancelled';
}