<?php if (!defined('THINK_PATH')) exit();?><div class="content <?php echo ($color); ?>-in">
    <div class="info <?php echo ($color); ?>-in">
        <table>
            <tr>
                <td>年龄：</td><td colspan="2"><input id="FUND_age" name="age" type="tel" min="0" max="64" value="35" class="radius-input" info="年龄" /></td>
            </tr>

            <tr>
                <td class="midtext">投保金额(港币)：</td>
                <td><em>50万</em><span class="radio on fundamount" data-option="50"  info="投保金额:50万" > </span></td>
            </tr>
            <tr>
                <td>&nbsp;</td><td><em>100万</em><span class="radio fundamount" data-option="100"  info="投保金额:100万" > </span></td>
            </tr>
            <tr>
                <td>&nbsp;</td><td><em>200万</em><span class="radio fundamount" data-option="200"  info="投保金额:200万" > </span></td>
            </tr>
            <tr style="display: none;">
                <td>职业：</td><td colspan="2"><em>文职</em><span class="radio on fundvocation" data-option="1" info="文职"> </span></td>
            </tr>
            <tr  style="display: none;">
                <td>&nbsp;</td><td colspan="2"><em>轻度劳动力</em><span class="radio fundvocation" data-option="2" info="轻度劳动力"> </span></td>
            </tr>
            <tr  style="display: none;">
                <td>&nbsp;</td><td colspan="2"><em>技术性劳动力</em><span class="radio fundvocation" data-option="3" info="技术性劳动力"> </span></td>
            </tr>
            <tr>
                <td>供款年期：10年</td>
            </tr>
        </table>
    </div>
</div>


<input class="<?php echo ($color); ?>_select" type="hidden" value="0" />
<input  name="<?php echo ($code); ?>_price" codename="<?php echo ($code_name); ?>"  class="<?php echo ($color); ?>_price totalprice  <?php echo ($code); ?>_price" type="hidden" value="0" />
<input name="<?php echo ($code); ?>_info" class="<?php echo ($code); ?>_info selected"  codename="<?php echo ($code_name); ?>"  type="hidden" value="" />
<script language="JavaScript">

    jQuery(function ($) {
        $(".<?php echo ($color); ?>-in .fundamount").click(function(){
            $(".<?php echo ($color); ?>-in .fundamount").removeClass("on");
            $(this).addClass("on");
            //init_<?php echo ($code); ?>();
        });

        $(".<?php echo ($color); ?>-in .fundvocation").click(function(){
            $(".<?php echo ($color); ?>-in .fundvocation").removeClass("on");
            $(this).addClass("on");
            //init_<?php echo ($code); ?>();
        });
       // init_<?php echo ($code); ?>();
    });

</script>