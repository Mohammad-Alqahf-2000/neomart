<?php

namespace App\Enums;

enum StoreOrderStatusEnum: string
{
    // "pending ,processing ,confirmed ,shipping ,cancelled,completed , delivered ,refund"
    case PENDING = "pending";
    case PROCESSING = "processing";
    case CONFIRMED = "confirmed";
    case SHIPPING = "shipping";
    case CANCELLED = "cancelled";
    case COMPLETED = "completed";
    case DELIVERED = "delivered";
    case REFUND = "refund";
}
