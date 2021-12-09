<?php if(isset($user)): ?>
    <article class="user-outer model compressed">
        <h2><?= $user[USER_NAME]; ?> <?= $user[USER_SURNAME] ?? ''; ?></h2>
        <span><?= traduce('Email'); ?>: <?= $user[USER_EMAIL]; ?></span><br/>
        <span><?= traduce('Registration date'); ?>: <?= date(DATE_FORMAT, strtotime($user[USER_DATE])); ?> </span>
    </article>
<?php endif; ?>