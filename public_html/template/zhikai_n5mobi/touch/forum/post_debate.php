<?php echo '';exit;?>
<div class="n5_tsztys cl">
    <p>{lang debate_square_point}</p>
    <textarea name="affirmpoint" id="affirmpoint" class="txt" oninput="this.style.height = this.scrollHeight + 'px';">$debate[affirmpoint]</textarea>
    <p>{lang debate_opponent_point}</p>
    <textarea name="negapoint" id="negapoint" class="txt" oninput="this.style.height = this.scrollHeight + 'px';">$debate[negapoint]</textarea>
    <p>{lang endtime} <font class="xg1 redc">(日期格式：2015-05-05)</font></p>
    <input type="text" name="endtime" id="endtime" class="txt" autocomplete="off" value="$debate[endtime]"  />
    <p>{lang debate_umpire}:</p>
    <input type="text" name="umpire" id="umpire" class="txt" value="$debate[umpire]"  />
</div>

