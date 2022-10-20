@if ($invoice)
    <strong>{{\App\Models\Settings::getSettings()->compagny_name}}</strong><br />
    {{\App\Models\Settings::getSettings()->compagny_address}}<br />
    {{\App\Models\Settings::getSettings()->code}}<br />
    {{\App\Models\Settings::getSettings()->vat}}<br />
    {{\App\Models\Settings::getSettings()->phone}}
@else
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <h3>De,</h3>
    {{\App\Models\Settings::getSettings()->compagny_name}}<br />
    {{\App\Models\Settings::getSettings()->compagny_address}}<br />
    {{\App\Models\Settings::getSettings()->code}}<br />
    {{\App\Models\Settings::getSettings()->vat}}<br />
    {{\App\Models\Settings::getSettings()->phone}}
</div> 
@endif