<h4>Username: {{ $order->user->name }}</h4>
<h4>Course: {{ $order->course->title_en }}</h4>
<h4>Order Number: {{ $order->order_number }}</h4>
<h4>Total: {{ $order->total }} EGP</h4>
<h4>Paymob Order ID: {{ $order->paymob_order_id }}</h4>
<h4>Transaction ID: {{ $order->transaction_id }}</h4>
<h4>HMAC: {{ $order->hmac }}</h4>