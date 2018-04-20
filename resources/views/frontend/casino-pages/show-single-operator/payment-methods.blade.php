<div class="oc-payment-method">
    <ul class="oc-payment-method-ul">
        @if($getOperator->pm_visa === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/visa.png') }}" alt="Visa" title="Visa" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_mastercard === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/mastercard.png') }}" alt="MasterCard" title="MasterCard" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_prepaid_card === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/prepaid-card.png') }}" alt="Prepaid Card" title="Prepaid Card" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_cash_at_the_cage === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/cash-at-casino-cage.png') }}" title="Cash at Casino Cage" alt="Cash at Casino Cage" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_ach === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/ach.png') }}" alt="ACH" title="ACH" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_paypal === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/paypal.png') }}" alt="PayPal" title="PayPal" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_skrill === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/skrill.png') }}" alt="Skrill" title="Skrill" class="img-responsive">
            </li>
        @endif

        @if($getOperator->pm_pay_near_me === 1)
            <li>
                <img src="{{ Cdn::asset('img/payment-methods/pay-near-me.png') }}" alt="Pay Near Me" title="Pay Near Me" class="img-responsive">
            </li>
        @endif
    </ul>
</div>