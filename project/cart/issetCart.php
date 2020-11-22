<div class="content">
  <main class="main-content" id="MainContent">
    <div class="page-width page-content">
      <div id="CartPage" class="grid">
        <div class="grid_item">
          <header class="section-header">
            <h1 class="section-header_title">
              Cart
            </h1>
          </header>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $subtotal = 0;
              foreach ($products as $item) :
                $total = $item['price'] * $item['quantity'];
                $subtotal += $total;
              ?>
                <tr>
                  <td><img src="<?= $item['image'] ?>" alt="" style="width:100px"></td>
                  <td><?= $item['name'] ?></td>
                  <td><?= number_format($item['price']) . " USD" ?></td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <a href="cart_process.php?action=decrease&id=<?= $item['id'] ?>" class="changeQuantity">-</a>
                      <input type="text" name="itemQty" class="cart_quantity" value="<?= $item['quantity'] ?>">
                      <a href="cart_process.php?action=increase&id=<?= $item['id'] ?>" class="changeQuantity">+</a>
                    </div>
                  </td>
                  <td>
                    <?= number_format($total) . " USD" ?>
                  </td>
                  <td>
                    <a href="cart_process.php?id=<?= $item['id'] ?>&action=delete" style="text-align: center; color:red;"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="cart_row cart_footer">
            <div class="grid">
              <div class="grid_item medium-up-one-half text-right medium-up-push-one-half">
                <div class="h3 cart_subtottal"><?= "SUBTOTAL: " . $subtotal . " USD" ?></div>
                <p class="cart_note">
                  Shipping, taxes, and discount codes calculated at checkout.
                </p>
                <div class="cart_checkout-wrapper">
                  <a href="checkout.php" class="btn btn-dark btnBuy-btn">Check Out</a>

                </div>
                <div class="cart_checkout-wrapper">
                  <a href="../index.php" class="btn btn-dark btnBuy-btn">Continue Shopping</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>