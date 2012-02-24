<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Etape 2'); ?>

<div class="left">
  <div class="content">
    <h1>INSCRIPTIONS</h1>
    <?php include_partial("registration/progress", array("current_step" => 1)); ?>
    <form method="post" action="<?php echo url_for("registration/step2"); ?>">
      <table>
        <?php echo $form ?>
        <tr>
          <td></td>
          <td>
            <input type="submit" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<div class="right">
  <?php include_partial("global/infobox"); ?>
  <?php include_component("boxes", "countbox"); ?>
</div>
