<div class="pure-g">
    <div class="pure-u-xl-1">
        <table style="margin: auto;" id="tab_history" class="pure-table pure-table-bordered pure-form pure-form-align center-margin">
            <thead>
                <tr>
                    <th>Number of exchange</th>
                    <th>Amount</th>
                    <th>Cellar</th>
                    <th>Amount in PLN</th>
                    <th>Date of exchange</th>
                </tr>           
            </thead>
            <tbody>
                {foreach $data as $d}
                    {strip}
                        <tr>
                            <td>{$d["idresult"]}</td>
                            <td>{$d["amount"]}</td>
                            <td>{$d["cellar"]}</td>
                            <td>{$d["amountPLN"]}</td>
                            <td>{$d["date"]}</td>
                        </tr>
                    {/strip}
                {/foreach}
            </tbody>
        </table>
    </div>
</div>