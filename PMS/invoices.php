<?php include('includes/header.inc.php');
  include('models/subscription.class.php');
  ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Card Number</th>
      <th scope="col">Subscription Plan</th>
      <th scope="col">Subscription Date</th>
      <th scope="col">Subscription Expiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $obj = new subscription();
    $card_data = $obj->pure_select('invoices');
    $count = 1;
    foreach($card_data as $data):?>
    <tr>
      <td><?= $count++ ?></td>
      <td><?= $data['invoice_no'] ?></td>
      <td><?= $data['card_number'] ?></td>
      <td><?= $data['subscription_type'] ?></td>
      <td><?= $data['subscription_starting_date'] ?></td>
      <td><?= $data['subscription_expiry_date'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>