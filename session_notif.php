<?php if (isset($_SESSION['sukses']) && $_SESSION['sukses']) : ?>
<div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
  <strong>Sukses,</strong> <?=$_SESSION['msg']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
unset($_SESSION['sukses']);
unset($_SESSION['msg']);
endif; ?>

<?php if (isset($_SESSION['gagal']) && $_SESSION['gagal']) : ?>
<div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
  <strong>Gagal,</strong> <?=$_SESSION['msg']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
unset($_SESSION['gagal']);
unset($_SESSION['msg']);
endif; ?>