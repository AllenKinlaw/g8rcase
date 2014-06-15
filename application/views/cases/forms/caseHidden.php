<input name="docket" value="<?php if (isset($fields['docket'])) {echo $docket;};?>" type="hidden" class="form-control ">
<input name="title" value="<?php if (isset($fields['title'])) {echo $title;};?>" type="hidden" class="form-control ">
<input name="type" value="<?php if (isset($fields['type'])) {echo $type;};?>" type="hidden" class="form-control ">
<input name="claims" value="<?php if (isset($fields['claims'])) {echo $claims;};?>" type="hidden" class="form-control ">
<input name="status" value="<?php if (isset($fields['status'])) {echo $status;};?>" type="hidden" class="form-control ">
<input name="partytype" value="<?php if (isset($fields['partytype'])) {echo $partytype;};?>" type="hidden" class="form-control ">
<input name="resolution" value="<?php if (isset($fields['resolution'])) {echo $resolution;};?>" type="hidden" class="form-control ">
<input name="datefiled" value="<?php if (isset($fields['datefiled'])) {echo date('Y-M-d',$datefiled->sec);};?>" type="hidden" class="form-control ">









