 @php
    $totalDiscounte = 0;
    $totalPrice = 0;
@endphp
@foreach ($purchaseHistoryData as $puchaseData)
    <h3 class="font-bold mb-2 uppercase">{{ $puchaseData->payment_type }}</h3>
    <p class="text-sm">
        {{ \Carbon\Carbon::Parse($puchaseData->created_at)->timezone($eventData->timezone)->isoFormat('LLLL') }}
        (GMT {{ $eventData->timezone }})</p>
    <p class="text-sm">


        @if (isset($puchaseData->userEvent->is_paid_user) && !empty($puchaseData->userEvent->is_paid_user) && $puchaseData->transaction_id!= null)
            Txn ID:
            {{ $puchaseData->transaction_id }} <br>
        @else
            Txn ID:
            {{ $puchaseData->payment_intent }} <br>
        @endif

        @if ($puchaseData->payment_id && !empty($puchaseData->payment_id))
            Payment ID :
            {{ $puchaseData->payment_id }}
        @endif
    </p>

    <table class="w-full mb-5 mt-2 border rounded text-sm">
        <thead>
            <tr>
                <th class="w-50 py-3 px-4">Participation Fee</th>
                <th class="w-50 py-3 px-4">Free</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($puchaseData->user_reward as $user_rewardData)
                <tr>
                    <td class="w-50 py-3 px-4">
                        <h4 class="fpoppins font-bold text-md">{{ $user_rewardData->rewards->name }}
                        </h4>
                        <span class="text-xs">Size {{ $user_rewardData->size }} | Quanity :
                            {{ $user_rewardData->quantity }}</span>
                    </td>
                    <td class="w-50 py-3 px-4">
                        <span class="text-sm">{{ $user_rewardData->currency }}
                            {{ formatPrice($puchaseData->currency, $user_rewardData->amount) }}</span>
                    </td>
                </tr>
            @endforeach

        <tfoot>
            <tr class="border-top">
                <td class="w-50 pt-3 px-4">
                    <h6 class="fpoppins">Coupon used</h6>
                </td>
                <td class="w-50 pt-3 px-4">
                    <span class="text-sm">
                        {{ (!empty($puchaseData->coupon_code) && ($puchaseData->user_reward->count() > 0)) ? $puchaseData->coupon_code : 'NA' }}
                    </span>
                </td>
            </tr>
            <tr>
                <td class="w-50 pb-3 px-4">
                    <h6 class="fpoppins">Discount</h6>
                </td>
                <td class="w-50 pb-3 px-4">
                    @if (isset($puchaseData->total_amount) &&
                            isset($puchaseData->discount) &&
                            !empty($puchaseData->discount) &&
                            !empty($puchaseData->total_amount) && ($puchaseData->user_reward->count() > 0))
                        <span class="text-sm">
                            {{ formatPrice($puchaseData->currency, ($puchaseData->discount / $puchaseData->total_amount) * 100) }}%
                            ({{ $puchaseData->currency }}
                            {{ formatPrice($puchaseData->currency, $puchaseData->discount) }})
                        </span>
                    @else
                        <span class="text-sm">NA</span>
                    @endif
                </td>
            </tr>
            <tr class="border-top">
                <td class="w-50 py-3 px-4">
                    <h6 class="fpoppins">Total</h6>
                </td>
                <td class="w-50 py-3 px-4">
                    @if ($puchaseData->user_reward->count() > 0)
                        <span class="text-sm">{{ $puchaseData->currency }}  {{ formatPrice($puchaseData->currency, $puchaseData->total_paid) }}</span>
                    @else
                    <span class="text-sm"> NA </span>
                    @endif

                </td>
            </tr>
            <tr class="border-top">
                @if (isset($puchaseData->userEvent->address) && !empty($puchaseData->userEvent->address))
                    <td colspan="2" class="w-full py-3 px-4">
                        <h6>Address :</h6>
                        <p></p>
                        <p>
                            {{ !empty($puchaseData->userEvent->address) ? $puchaseData->userEvent->address : '' }}{{ !empty($puchaseData->userEvent->city) ? ', ' . $puchaseData->userEvent->city : '' }}{{ !empty($puchaseData->userEvent->state) ? ', ' . $puchaseData->userEvent->state : '' }}{{ !empty($puchaseData->userEvent->postal_code) ? ', ' . $puchaseData->userEvent->postal_code : '' }}
                        </p>
                    </td>
                @endif
            </tr>
        </tfoot>
    </table>
@endforeach
