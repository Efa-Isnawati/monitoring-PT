<?php foreach($data as $d): ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>barangMasuk/detail_data" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Transaksi -->
                            <div class="form-group"><label>ID Barang Masuk</label>
                                <input class="form-control" name="idbm" value="<?= $d->id_barang_masuk ?>" type="text"
                                    placeholder="" autocomplete="off" readonly>
                            </div>

                            <!-- Barang -->
                            <div class="form-group"><label>Nama Barang</label>
                                <input name="barang" type="hidden" value="<?= $d->id_barang ?>">
                                <input class="form-control" name="preview" type="text" value="<?= $d->nama_barang ?>"
                                    autocomplete="off" readonly>
                            </div>

                            <!-- Tgl Masuk -->
                            <div class="form-group"><label>Tanggal Masuk</label>
                                <input class="form-control" name="tgl" id="datepicker" value="<?= format($d->tgl_masuk) ?>"
                                    type="text" placeholder="" autocomplete="off">
                            </div>

                            <!-- opsi Supplier -->
                            <?php if($jmlsupplier > 0): ?>
                            <div class="form-group"><label>Supplier</label>
                                <select name="supplier" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($supplier as $s): ?>

                                    <?php if($d->id_supplier == $s->id_supplier): ?>
                                    <option value="<?= $s->id_supplier ?>" selected><?= $s->nama_supplier ?></option>
                                    <?php else: ?>
                                    <option value="<?= $s->id_supplier ?>"><?= $s->nama_supplier ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Supplier</label>
                                <input type="hidden" name="supplier">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data supplier!)</i></span>
                                    <a href="<?= base_url() ?>supplier" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Jumlah Barang -->
                            <div class="form-group"><label>Jumlah Masuk</label>
                                <input name="jmlmasuklama" type="hidden" value="<?= $d->jumlah_masuk ?>">
                                <input class="form-control" name="jmlmasuk" type="number"
                                    value="<?= $d->jumlah_masuk ?>">
                            </div>


                        

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barangMasuk.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarangmasuk.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});

$('#datepicker').datepicker({
    autoclose: true
});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {

    })
});
</script>
<?php endif; ?>

<?php endforeach; ?>