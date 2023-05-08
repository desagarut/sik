<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Neo SIDeGa
 */
?>

<div class="col-md-2">
	<select class="form-control" id="list_dusun" name="dusun" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/dusun"); ?>')">
		<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun); ?></option>
		<?php foreach ($list_dusun AS $data): ?>
			<option value="<?= $data['dusun']; ?>" <?= selected($dusun, $data['dusun']); ?>><?= set_ucwords($data['dusun']); ?></option>
		<?php endforeach;?>
	</select>
</div>
<div class="col-md-2">
	<?php if ($dusun): ?>
		<select class="form-control" id="list_rw" name="rw" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/rw"); ?>')" >
			<option value="">Pilih RW</option>
			<?php foreach ($list_rw AS $data): ?>
				<option value="<?= $data['rw']; ?>" <?= selected($rw, $data['rw']); ?>><?= set_ucwords($data['rw']); ?></option>
			<?php endforeach;?>
		</select>
	<?php endif; ?>
</div>
<div class="col-md-2">
	<?php if ($rw): ?>
		<select class="form-control" id="list_rt" name="rt" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/rt"); ?>')">
			<option value="">Pilih RT</option>
			<?php foreach ($list_rt AS $data): ?>
				<option value="<?= $data['rt']; ?>"<?= selected($rt, $data['rt']); ?>><?= set_ucwords($data['rt']); ?></option>
			<?php endforeach;?>
		</select>
	<?php endif; ?>
</div>