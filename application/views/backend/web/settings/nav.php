<!-- Card Header -->
<div class="card-header card-nav bg-transparent border-bottom d-sm-flex justify-content-sm-between">
    <ul class="card-header-links nav nav-underline ml-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?=$this->uri->segment('3') == '' ? 'active' : ''?>" href="<?=base_url('webcontrol/settings')?>">Global Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$this->uri->segment('3') == 'authentication' ? 'active' : ''?>" href="<?=base_url('webcontrol/settings/authentication')?>">Authentication Pages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$this->uri->segment('3') == 'menu' ? 'active' : ''?>" href="<?=base_url('webcontrol/settings/menu')?>">Menu Sections</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$this->uri->segment('3') == 'info-cards' ? 'active' : ''?>" href="<?=base_url('webcontrol/settings/info-cards')?>">Information Cards</a>
        </li>
    </ul>
</div>
<!-- /card header -->