<div
    class="card-header card-nav bg-transparent border-bottom d-sm-flex justify-content-sm-between">
    <h3 class="mb-2 mb-sm-n5"><?php echo lang('transactions') ?></h3>

    <ul class="card-header-links nav nav-underline" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?= $this->uri->segment(2) == 'view-client' ? 'active' : '' ?>" href="<?=base_url('clients/view-client/'.$userInfo->userId)?>"><?php echo lang('deposits') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $this->uri->segment(2) == 'view-client-withdrawals' ? 'active' : '' ?>" href="<?=base_url('clients/view-client-withdrawals/'.$userInfo->userId)?>"><?php echo lang('withdrawals') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $this->uri->segment(2) == 'view-client-earnings' ? 'active' : '' ?>" href="<?=base_url('clients/view-client-earnings/'.$userInfo->userId)?>"><?php echo lang('earnings') ?></a>
        </li>
		<li class="nav-item">
			<a class="nav-link <?= $this->uri->segment(2) == 'credit-client' ? 'active' : '' ?>" href="<?=base_url('clients/credit-client/'.$userInfo->userId)?>">
<!--				--><?php //echo lang('earnings') ?>
				Credit
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?= $this->uri->segment(2) == 'debit-client' ? 'active' : '' ?>" href="<?=base_url('clients/debit-client/'.$userInfo->userId)?>">
<!--				--><?php //echo lang('earnings') ?>
				Debit
			</a>
		</li>
    </ul>

</div>
