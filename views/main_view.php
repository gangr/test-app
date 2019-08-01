<!-- Content template moved to view file -->
<!-- Inline styles moved to scss file -->
<!-- Legacy html tags removed -->
<!-- Second h1 changed to h2, only one h1 tag should left due to the SEO reasons -->
<!-- for attributes added to labels -->
<!-- Submit button click handler moved to js file -->
<!-- Ids changed to classes -->
<!-- Class added to form -->

<?php
    global $config;
?>

<?php if($config['devMode']) : ?>
    <a href="/admin">Admin panel</a>
<?php endif; ?>

<div class="page-wrapper">
    <h1 class="heading">Kontaktforma</h1>
    <div class="errors"></div>
    <form class="contact-form">
        <h1>Lūdzu, ievadi savus datus</h1>
        <div class="row">
            <label for="full-name">Vārds, Uzvārds: <span class="asterisk">*</span></label>
            <input type="text" name="full-name" value="" id="full-name">
        </div>
        <div class="row">
            <label for="telefonanr">Telefons numurs: <span class="asterisk">*</span></label>
            <input type="text" name="telefonanr" value="" id="telefonanr">
        </div>
        <div class="row">
            <label for="address">Adrese:</label>
            <input type="text" name="address" value="" id="address">
        </div>
        <div class="row">
            <label for="zinojums">Ziņojums: <span class="asterisk">*</span></label>
            <textarea name="zinojums" id="zinojums"></textarea>
        </div>
        <div class="row submit-container">
            <a class="large" href="" id="submit">Sūtīt &rarr;</a>
        </div>
    </form>
</div>
