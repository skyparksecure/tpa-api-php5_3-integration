<?php

namespace TpaApi\Webservices\Models;

class PaymentMethodSupportDTO extends Model
{
    protected $fillable = array(
        'CreditCardPayments',
        'ElectronicWalletPayments',
        'DirectBankingPayments',
        'InvoicingPayments',
        'NoPaymentsOnWebsitePayments',
        'PNFPayments',
    );
}