<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\gpon;
use App\odc;
use App\odp;

class HomeContent extends Controller
{
    public function ContentDataProject()
    {
    	$data['all'] = project::count(); 
        $data['close'] = project::where('statusproj_id', 7)->count(); 
        $data['inventory'] = project::where(['statusproj_id' => 3, 
                                             'statusproj_id' => 4, 
                                             'statusproj_id' => 5,
                                             'statusproj_id' => 6])->count();
		$data['pembangunan'] = project::where(['statusproj_id' => 1,
											   'statusproj_id' => 2])->count(); 
        $data['kendala'] = project::where(['statusproj_id' => 8, 'statusproj_id' => 9])->count();

        return response()->json(['data' => $data], 200);
    }

    public function ContentDataGpon()
    {
    	$data['SMRSEM']['PLANNED'] = gpon::where(['sto_id' => 1, 'statuscons_id' => 1])->count();
    	$data['SMRSEM']['INSERVICE'] = gpon::where(['sto_id' => 1, 'statuscons_id' => 2])->count();
    	$data['SMRTSN']['PLANNED'] = gpon::where(['sto_id' => 2, 'statuscons_id' => 1])->count();
    	$data['SMRTSN']['INSERVICE'] = gpon::where(['sto_id' => 2, 'statuscons_id' => 2])->count();
    	$data['SMRPAA']['PLANNED'] = gpon::where(['sto_id' => 3, 'statuscons_id' => 1])->count();
    	$data['SMRPAA']['INSERVICE'] = gpon::where(['sto_id' => 3, 'statuscons_id' => 2])->count();
    	$data['SMRLMP']['PLANNED'] = gpon::where(['sto_id' => 4, 'statuscons_id' => 1])->count();
    	$data['SMRLMP']['INSERVICE'] = gpon::where(['sto_id' => 4, 'statuscons_id' => 2])->count();
    	$data['SMRPLL']['PLANNED'] = gpon::where(['sto_id' => 5, 'statuscons_id' => 1])->count();
    	$data['SMRPLL']['INSERVICE'] = gpon::where(['sto_id' => 5, 'statuscons_id' => 2])->count();
    	$data['SMRLOB']['PLANNED'] = gpon::where(['sto_id' => 6, 'statuscons_id' => 1])->count();
    	$data['SMRLOB']['INSERVICE'] = gpon::where(['sto_id' => 6, 'statuscons_id' => 2])->count();
    	$data['SMRSGK']['PLANNED'] = gpon::where(['sto_id' => 7, 'statuscons_id' => 1])->count();
    	$data['SMRSGK']['INSERVICE'] = gpon::where(['sto_id' => 7, 'statuscons_id' => 2])->count();
    	$data['SMRSBR']['PLANNED'] = gpon::where(['sto_id' => 8, 'statuscons_id' => 1])->count();
    	$data['SMRSBR']['INSERVICE'] = gpon::where(['sto_id' => 8, 'statuscons_id' => 2])->count();
    	$data['SMRTMD']['PLANNED'] = gpon::where(['sto_id' => 9, 'statuscons_id' => 1])->count();
    	$data['SMRTMD']['INSERVICE'] = gpon::where(['sto_id' => 9, 'statuscons_id' => 2])->count();
    	$data['SMRSMR']['PLANNED'] = gpon::where(['sto_id' => 10, 'statuscons_id' => 1])->count();
    	$data['SMRSMR']['INSERVICE'] = gpon::where(['sto_id' => 10, 'statuscons_id' => 2])->count();
    	$data['TRGTGG']['PLANNED'] = gpon::where(['sto_id' => 11, 'statuscons_id' => 1])->count();
    	$data['TRGTGG']['INSERVICE'] = gpon::where(['sto_id' => 11, 'statuscons_id' => 2])->count();
    	$data['TRGSAN']['PLANNED'] = gpon::where(['sto_id' => 12, 'statuscons_id' => 1])->count();
    	$data['TRGSAN']['INSERVICE'] = gpon::where(['sto_id' => 12, 'statuscons_id' => 2])->count();
    	$data['TRGAGN']['PLANNED'] = gpon::where(['sto_id' => 13, 'statuscons_id' => 1])->count();
    	$data['TRGAGN']['INSERVICE'] = gpon::where(['sto_id' => 13, 'statuscons_id' => 2])->count();
    	$data['MLKMLA']['PLANNED'] = gpon::where(['sto_id' => 14, 'statuscons_id' => 1])->count();
    	$data['MLKMLA']['INSERVICE'] = gpon::where(['sto_id' => 14, 'statuscons_id' => 2])->count();
    	$data['MBDMBD']['PLANNED'] = gpon::where(['sto_id' => 15, 'statuscons_id' => 1])->count();
    	$data['MBDMBD']['INSERVICE'] = gpon::where(['sto_id' => 15, 'statuscons_id' => 2])->count();
    	$data['SAASTT']['PLANNED'] = gpon::where(['sto_id' => 16, 'statuscons_id' => 1])->count();
    	$data['SAASTT']['INSERVICE'] = gpon::where(['sto_id' => 16, 'statuscons_id' => 2])->count();
    	$data['BOGLKT']['PLANNED'] = gpon::where(['sto_id' => 17, 'statuscons_id' => 1])->count();
    	$data['BOGLKT']['INSERVICE'] = gpon::where(['sto_id' => 17, 'statuscons_id' => 2])->count();
    	$data['BOGBOT']['PLANNED'] = gpon::where(['sto_id' => 18, 'statuscons_id' => 1])->count();
    	$data['BOGBOT']['INSERVICE'] = gpon::where(['sto_id' => 18, 'statuscons_id' => 2])->count();

    	return response()->json(['data' => $data], 200);
    }

    public function ContentDataODC()
    {
    	$data['SMRSEM']['PLANNED'] = odc::where(['sto_id' => 1, 'statuscons_id' => 1])->count();
    	$data['SMRSEM']['INSERVICE'] = odc::where(['sto_id' => 1, 'statuscons_id' => 2])->count();
    	$data['SMRTSN']['PLANNED'] = odc::where(['sto_id' => 2, 'statuscons_id' => 1])->count();
    	$data['SMRTSN']['INSERVICE'] = odc::where(['sto_id' => 2, 'statuscons_id' => 2])->count();
    	$data['SMRPAA']['PLANNED'] = odc::where(['sto_id' => 3, 'statuscons_id' => 1])->count();
    	$data['SMRPAA']['INSERVICE'] = odc::where(['sto_id' => 3, 'statuscons_id' => 2])->count();
    	$data['SMRLMP']['PLANNED'] = odc::where(['sto_id' => 4, 'statuscons_id' => 1])->count();
    	$data['SMRLMP']['INSERVICE'] = odc::where(['sto_id' => 4, 'statuscons_id' => 2])->count();
    	$data['SMRPLL']['PLANNED'] = odc::where(['sto_id' => 5, 'statuscons_id' => 1])->count();
    	$data['SMRPLL']['INSERVICE'] = odc::where(['sto_id' => 5, 'statuscons_id' => 2])->count();
    	$data['SMRLOB']['PLANNED'] = odc::where(['sto_id' => 6, 'statuscons_id' => 1])->count();
    	$data['SMRLOB']['INSERVICE'] = odc::where(['sto_id' => 6, 'statuscons_id' => 2])->count();
    	$data['SMRSGK']['PLANNED'] = odc::where(['sto_id' => 7, 'statuscons_id' => 1])->count();
    	$data['SMRSGK']['INSERVICE'] = odc::where(['sto_id' => 7, 'statuscons_id' => 2])->count();
    	$data['SMRSBR']['PLANNED'] = odc::where(['sto_id' => 8, 'statuscons_id' => 1])->count();
    	$data['SMRSBR']['INSERVICE'] = odc::where(['sto_id' => 8, 'statuscons_id' => 2])->count();
    	$data['SMRTMD']['PLANNED'] = odc::where(['sto_id' => 9, 'statuscons_id' => 1])->count();
    	$data['SMRTMD']['INSERVICE'] = odc::where(['sto_id' => 9, 'statuscons_id' => 2])->count();
    	$data['SMRSMR']['PLANNED'] = odc::where(['sto_id' => 10, 'statuscons_id' => 1])->count();
    	$data['SMRSMR']['INSERVICE'] = odc::where(['sto_id' => 10, 'statuscons_id' => 2])->count();
    	$data['TRGTGG']['PLANNED'] = odc::where(['sto_id' => 11, 'statuscons_id' => 1])->count();
    	$data['TRGTGG']['INSERVICE'] = odc::where(['sto_id' => 11, 'statuscons_id' => 2])->count();
    	$data['TRGSAN']['PLANNED'] = odc::where(['sto_id' => 12, 'statuscons_id' => 1])->count();
    	$data['TRGSAN']['INSERVICE'] = odc::where(['sto_id' => 12, 'statuscons_id' => 2])->count();
    	$data['TRGAGN']['PLANNED'] = odc::where(['sto_id' => 13, 'statuscons_id' => 1])->count();
    	$data['TRGAGN']['INSERVICE'] = odc::where(['sto_id' => 13, 'statuscons_id' => 2])->count();
    	$data['MLKMLA']['PLANNED'] = odc::where(['sto_id' => 14, 'statuscons_id' => 1])->count();
    	$data['MLKMLA']['INSERVICE'] = odc::where(['sto_id' => 14, 'statuscons_id' => 2])->count();
    	$data['MBDMBD']['PLANNED'] = odc::where(['sto_id' => 15, 'statuscons_id' => 1])->count();
    	$data['MBDMBD']['INSERVICE'] = odc::where(['sto_id' => 15, 'statuscons_id' => 2])->count();
    	$data['SAASTT']['PLANNED'] = odc::where(['sto_id' => 16, 'statuscons_id' => 1])->count();
    	$data['SAASTT']['INSERVICE'] = odc::where(['sto_id' => 16, 'statuscons_id' => 2])->count();
    	$data['BOGLKT']['PLANNED'] = odc::where(['sto_id' => 17, 'statuscons_id' => 1])->count();
    	$data['BOGLKT']['INSERVICE'] = odc::where(['sto_id' => 17, 'statuscons_id' => 2])->count();
    	$data['BOGBOT']['PLANNED'] = odc::where(['sto_id' => 18, 'statuscons_id' => 1])->count();
    	$data['BOGBOT']['INSERVICE'] = odc::where(['sto_id' => 18, 'statuscons_id' => 2])->count();

    	return response()->json(['data' => $data], 200);
    }

    public function ContentDataODP()
    {
    	$data['SMRSEM']['PLANNED'] = odp::where(['sto_id' => 1, 'statuscons_id' => 1])->count();
    	$data['SMRSEM']['INSERVICE'] = odp::where(['sto_id' => 1, 'statuscons_id' => 2])->count();
    	$data['SMRTSN']['PLANNED'] = opc::where(['sto_id' => 2, 'statuscons_id' => 1])->count();
    	$data['SMRTSN']['INSERVICE'] = odp::where(['sto_id' => 2, 'statuscons_id' => 2])->count();
    	$data['SMRPAA']['PLANNED'] = odp::where(['sto_id' => 3, 'statuscons_id' => 1])->count();
    	$data['SMRPAA']['INSERVICE'] = odp::where(['sto_id' => 3, 'statuscons_id' => 2])->count();
    	$data['SMRLMP']['PLANNED'] = odp::where(['sto_id' => 4, 'statuscons_id' => 1])->count();
    	$data['SMRLMP']['INSERVICE'] = odp::where(['sto_id' => 4, 'statuscons_id' => 2])->count();
    	$data['SMRPLL']['PLANNED'] = odp::where(['sto_id' => 5, 'statuscons_id' => 1])->count();
    	$data['SMRPLL']['INSERVICE'] = odp::where(['sto_id' => 5, 'statuscons_id' => 2])->count();
    	$data['SMRLOB']['PLANNED'] = odp::where(['sto_id' => 6, 'statuscons_id' => 1])->count();
    	$data['SMRLOB']['INSERVICE'] = odp::where(['sto_id' => 6, 'statuscons_id' => 2])->count();
    	$data['SMRSGK']['PLANNED'] = odp::where(['sto_id' => 7, 'statuscons_id' => 1])->count();
    	$data['SMRSGK']['INSERVICE'] = odp::where(['sto_id' => 7, 'statuscons_id' => 2])->count();
    	$data['SMRSBR']['PLANNED'] = odp::where(['sto_id' => 8, 'statuscons_id' => 1])->count();
    	$data['SMRSBR']['INSERVICE'] = odp::where(['sto_id' => 8, 'statuscons_id' => 2])->count();
    	$data['SMRTMD']['PLANNED'] = odp::where(['sto_id' => 9, 'statuscons_id' => 1])->count();
    	$data['SMRTMD']['INSERVICE'] = odp::where(['sto_id' => 9, 'statuscons_id' => 2])->count();
    	$data['SMRSMR']['PLANNED'] = odp::where(['sto_id' => 10, 'statuscons_id' => 1])->count();
    	$data['SMRSMR']['INSERVICE'] = odp::where(['sto_id' => 10, 'statuscons_id' => 2])->count();
    	$data['TRGTGG']['PLANNED'] = odp::where(['sto_id' => 11, 'statuscons_id' => 1])->count();
    	$data['TRGTGG']['INSERVICE'] = odp::where(['sto_id' => 11, 'statuscons_id' => 2])->count();
    	$data['TRGSAN']['PLANNED'] = odp::where(['sto_id' => 12, 'statuscons_id' => 1])->count();
    	$data['TRGSAN']['INSERVICE'] = odp::where(['sto_id' => 12, 'statuscons_id' => 2])->count();
    	$data['TRGAGN']['PLANNED'] = odp::where(['sto_id' => 13, 'statuscons_id' => 1])->count();
    	$data['TRGAGN']['INSERVICE'] = odp::where(['sto_id' => 13, 'statuscons_id' => 2])->count();
    	$data['MLKMLA']['PLANNED'] = odp::where(['sto_id' => 14, 'statuscons_id' => 1])->count();
    	$data['MLKMLA']['INSERVICE'] = odp::where(['sto_id' => 14, 'statuscons_id' => 2])->count();
    	$data['MBDMBD']['PLANNED'] = odp::where(['sto_id' => 15, 'statuscons_id' => 1])->count();
    	$data['MBDMBD']['INSERVICE'] = odp::where(['sto_id' => 15, 'statuscons_id' => 2])->count();
    	$data['SAASTT']['PLANNED'] = odp::where(['sto_id' => 16, 'statuscons_id' => 1])->count();
    	$data['SAASTT']['INSERVICE'] = odp::where(['sto_id' => 16, 'statuscons_id' => 2])->count();
    	$data['BOGLKT']['PLANNED'] = odp::where(['sto_id' => 17, 'statuscons_id' => 1])->count();
    	$data['BOGLKT']['INSERVICE'] = odp::where(['sto_id' => 17, 'statuscons_id' => 2])->count();
    	$data['BOGBOT']['PLANNED'] = odp::where(['sto_id' => 18, 'statuscons_id' => 1])->count();
    	$data['BOGBOT']['INSERVICE'] = odp::where(['sto_id' => 18, 'statuscons_id' => 2])->count();

    	return response()->json(['data' => $data]);
    }
}
