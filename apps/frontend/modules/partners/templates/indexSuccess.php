<?php use_stylesheet('partners.css') ?>
<?php slot('title', 'hf.lan &raquo; Partenaires'); ?>

<div class="left">
    <div class="content">
        <h1>PARTENAIRES</h1>
        <?php foreach ($partners as $partner): ?>
            <div class="partner">
                <a href="http://<?php echo $partner->getUrl(); ?>">
                    <img alt="<?php echo $partner->getName(); ?>"
                         src="/uploads/partners/<?php echo $partner->getLogo(); ?>"/>
                </a>
                <p>
                    <?php echo $partner->getDescription(); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="right">
    <?php include_partial("global/infobox"); ?>
    <?php include_component("boxes","countbox"); ?>
</div>