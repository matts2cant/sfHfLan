<?php use_stylesheet('partners.css') ?>
<?php slot('title', 'hf.lan &raquo; Contact'); ?>

<div class="left">
    <div class="content">
        <h1>CONTACT</h1>
        <br/>
        <img src="/images/icons/email.png"/> <strong>Par mail :</strong>
        <p style="padding-left: 20px">
            <a href="mailto:contact@hf-lan.fr">infos@hf-lan.fr</a>
        </p>
        <br/>
        <img src="/images/icons/building.png"/> <strong>A l'adresse :</strong><br/>
        <p style="padding-left: 20px">
            Club PC - ESIEE Paris<br/>
            2, boulevard Blaise Pascal<br/>
            Cité DESCARTES<br/>
            BP 99<br/>
            93162 Noisy le Grand CEDEX<br/><br/>
        </p>

    </div>
</div>
<div class="right">
    <?php include_partial("global/infobox"); ?>
    <?php include_component("boxes","countbox"); ?>
</div>