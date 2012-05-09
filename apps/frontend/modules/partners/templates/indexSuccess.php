<?php use_stylesheet('partners.css') ?>
<?php slot('title', 'hf.lan &raquo; Partenaires'); ?>


<div class="page-header">
  <h1>Partenaires</h1>
</div>

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