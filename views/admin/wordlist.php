<?php 

?>
<h1>Wordlist</h1>
<section>

    <form action="" method="post">
    <div class="" style="">
    <input type="text" class="" name="letter" />
    <input type="text" class="" name="word" />
    <?php submit_button(); ?>
    </div>
    </form>

    <form action="" method="post">
    <select name="sets">
        <option value="words">Words</option>
        <option value="phrases">Phrases</option>
        <option value="riddles">Riddles</option>
    <select>
    <?php submit_button(); ?>
    </form>

</section>
<table>
    <tr>
        <th>Letter</th>
  
        <th>Content</th>
    </tr>
    <?php foreach($words as $word): ?>
        <tr>
            <td><?php echo $word->letter_type; ?></td>
            <td><?php echo $word->word; ?></td>
     
        </tr>
    <?php endforeach; ?>

</table>