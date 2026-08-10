<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    // "unpaid , pending , paid , partoally_paid , failed , refunded , partially_refunded", "canceled"
    case UNPAID = "unpaid";
    case PENDING = "pending";
    case PAID = "paid";
    case PARTOALLY_PAID = "partoally piad";
    case FAILED = "failed";
    case REFUNDED = "refunded";
    case PARTIALLY_REFUNDED = "partially refunded";
    case CANCELLED = "cancelled";
}
