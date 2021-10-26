<?php 

?>
<h1>Wordlist</h1>
<section>

</form>

  

</section>

<div class="tab-box" >
    <div class="tabs tab-active" data-id="tab_words">Words</div>
    <div class="tabs" data-id="tab_phrases">Phrases</div>
    <div class="tabs" data-id="tab_riddles">riddles</div>
</div>

<div id="tab_words" class="active content">
<form id="change_field_form" action="" method="post">
<!--
<select id="" name="type">
    <option value="words">Words</option>
    <option value="phrases">Phrases</option>
    <option value="riddles">Riddles</option>
</select>
-->
    <div class="" style="">
    <label>Letter</label>
    <input id="type" type="hidden" name="type" value="words" />
    <input type="text" class="" name="letter" required/>
    <label>Word</label>
    <input type="text" class="" name="word" required/>
    <?php submit_button('Add Word'); ?>
    </div>
</form>
    <table class="table-area ">
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
</div>
<div id="tab_phrases" class="content">
<form id="change_field_form" action="" method="post">
<!--
<select id="" name="type">
    <option value="words">Words</option>
    <option value="phrases">Phrases</option>
    <option value="riddles">Riddles</option>
</select>
-->
    <div class="" style="">
    <label>Letter</label>
    <input id="type" type="hidden" name="type" value="phrases" />
    <input type="text" class="" name="letter" required />
    <label>Word</label>
    <input type="text" class="" name="phrase" required />
    <?php submit_button('Add Phrase'); ?>
    </div>
</form>
    <table class="table-area ">
        <tr>
            <th>Phrases</th>
    
            <th>Content</th>
        </tr>
        <?php foreach($phrases as $phrase): ?>
            <tr>
                <td><?php echo $phrase->letter_type; ?></td>
                <td><?php echo $phrase->phrase; ?></td>
        
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<div id="tab_riddles" class="content">
<form id="change_field_form" action="" method="post">
<!--
<select id="" name="type">
    <option value="words">Words</option>
    <option value="phrases">Phrases</option>
    <option value="riddles">Riddles</option>
</select>
-->
    <div class="" style="">
    <label>Letter</label>
    <input id="type" type="hidden" name="type" value="riddles" />
    <input type="text" class="" name="letter" required/>
    <label>Word</label>
    <input type="text" class="" name="riddle" required/>
    <?php submit_button('Add Riddle'); ?>
    </div>
</form>
    <table class="table-area ">
        <tr>
            <th>Riddles</th>
    
            <th>Content</th>
        </tr>
        <?php foreach($riddles as $riddle): ?>
            <tr>
                <td><?php echo $riddle->letter_type; ?></td>
                <td><?php echo $riddle->riddle; ?></td>
        
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<style>
.content
{
    display: none;
    margin-top: 12px;
}

.active 
{
    display: block;
  
}

.tab-active
{
    background-color: black;
    color:white;
}

.tab-box
{
    display: flex;
    flex-direction: row;
}

.tabs 
{

    margin-right: 16px;
    border: 1px solid black;
    padding: 2px;
    width: 50px;
}

.table-area 
{
    bordeR: 1px solid black;
}

td 
{
    border: 1px solid black;
}
</style>
<script>





</script>