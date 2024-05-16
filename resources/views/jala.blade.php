<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    @vite(['resources/css/pdf-style.css'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @page {
            margin: 20px 20px 20px 20px;
        }

        header {
            padding: 2px;
        }

        table tr,
        th,
        td {
            border: 1px solid #d2d2d2;
            border-collapse: collapse;
            padding: 7px;
        }

        table tr th {
            font-size: 11px;
            font-weight: 400;
            color: #000000;
        }

        table tr td {
            font-size: 10px;
        }

        .table-bg {
            background: #F4F4F4;
        }

        .position-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .container {
            max-width: 1024px !important;
        }
    </style>

</head>

<body class="container mx-auto">
@php
    use Illuminate\Support\Facades\App;
    $langQuery = request()->query('lang');

    if(!empty($langQuery) && $langQuery === 'bn'){
        App::setLocale('bn');
    }

    $commonKeys = [
        1 => "০১",
        2 => "০২",
        3 => "০৩",
        4 => "০৪",
        5 => "০৫",
    ];
    $commonKeysen = [
        1 => "01",
        2 => "02",
        3 => "03",
        4 => "04",
        5 => "05",
    ];
    $locationOfInstituteInfoKeys = [
        1 => "৫.১.১",
        2 => "৫.১.২",
        3 => "৫.১.৩",
        4 => "৫.১.৪",
        5 => "৫.১.৫",
    ];

    $productInfoKeys = [
        1 => "৬.১.১",
        2 => "৬.১.২",
        3 => "৬.১.৩",
        4 => "৬.১.৪",
        5 => "৬.১.৫",
    ];

    $existingGasInfoKeys = [
        1 => "৮.১.১",
        2 => "৮.১.২",
        3 => "৮.১.৩",
        4 => "৮.১.৪",
        5 => "৮.১.৫",
    ];

    $proposedGasInfoKeys = [
        1 => "৮.৩.১",
        2 => "৮.৩.২",
        3 => "৮.৩.৩",
        4 => "৮.৩.৪",
        5 => "৮.৩.৫",
    ];

    $bankMfsList = [
        "brac" => "BRAC Bank",
        "dbbl" => "Dutch Bangla Bank",
        "cbl" => "City Bank",
        "mtb" => "Mutual Trust Bank",
        "bkash" => "bKash",
        "nagad" => "Nagad",
        "rocket" => "Rocket",
    ];
    $connection_statuses = [
        1 => "Active",
        2 => "Temporary Isolation",
        3 => "Permanent Isolation"
    ];
    $isConnected = [
        1 => "Yes",
        0 => "No"
    ];

    $landTypes = [
        1 => "Government",
        2 => "Semi-Government",
        3 => "Other"
    ];
    $landOwnershipTypes = [
        1 => "Own Unit",
        2 => "Own (Joint)",
        3 => "Hired",
        4 => "Allocated"
    ];

    $typeOfIndustryList = [
        1 => "Glass",
        2 => "Silicate",
        3 => "Ceramic",
        4 => "Lyme",
        5 => "Cement",
        6 => "Plastic"
    ];
    $gasConnectionPreExistsList = [
        1 => "Yes",
        0 => "No"
    ];

    $productionProcessList = [
        1 => "Continuous",
        2 => "With Breaks"
    ];
    $yesNoList = [
        1 => "Yes",
        0 => "No"
    ];
@endphp
<header>
    <div class="mt-10 flex grid grid-flow-col">
        <div class="w-100">
            <img src="https://jalalabadgas.org.bd/themes/responsive_npf/img/logo/jalalabadgas.png" alt=""
                 style="width:80px;">
        </div>
        <div class="w-100 text-center">
            <h2 class="text-bold text-2xl">{{ __('Jalalabad Gas Transmission and Distribution System Limited') }}</h2>
            <p class="text-bold">( {{ __('A company of Petrobangla') }} )</p>
            <p> {{ __('Gas Bhaban, Mendibag, Sylhet') }}</p>
            <p class="text-lg">{{ __('Industrial/Captive Power/Tea Garden Category Customer Gas Connection/Load Increase Application Form') }}
            </p>
        </div>
        <div class="w-100 flex items-center justify-end mr-5">
            <div class="border border-black flex items-center justify-center" style="width: 80px;height: 80px;">
                <p>{{ __('Picture') }}</p>
            </div>
        </div>
    </div>
</header>

<div style="clear: both;"></div>

<footer>
    <div class="w-50 position-bottom" style="display: inline-block;">
        <p class="m-0 w-85 fs-12">Last Modified: <span class="fs-12">{{ $record->updated_at->format('Y-m-d') }}</span></p>
    </div>
</footer>


<main>
    <div class="w-100">
        <div class="flex items-end justify-end">
            <div class="flex">
                <p>{{ __('Application Receipt Date:') }}</p>
                <p class="font-semibold mb-2 ml-3">
                    {{ $record->created_at->format('Y-m-d') }}
                </p>
            </div>
        </div>
        <div class="flex items-end justify-end">
            <div class="flex">
                <p>{{ __('No.:') }} </p>
                <p class="font-semibold mb-2 ml-3">
                    {{ $record->form_no}}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Name of the Institution:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->name }}
                </p>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('2. Contact Address:') }}</p>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="flex w-50">
                <p class="flex">{{ __('a) Factory:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->factory_address }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex">{{ __('Phone:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->factory_phone }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex">{{ __('b) Head Office:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->head_office_address }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex">{{ __('Phone:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->head_office_phone }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex">{{ __('c) Billing Office:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->billing_address }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex">{{ __('Phone:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->billing_phone }}
                </p>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-2">
            <div class="flex w-50">
                <p class="flex"> {{ __('3.1) Ownership of industrial establishments:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ __($landTypes[$record->land_type ?? '']) }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex"> {{ __('3.2) Land Ownership:') }} </p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ __($landOwnershipTypes[$record->land_ownership_type ?? '']) }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex"> {{ __('3.3) Type of Industry:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ __($typeOfIndustryList[$record->type_of_industry ?? '']) }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex"> {{ __('3.4) Trade License Number:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->trade_license }}
                </p>
            </div>
            <div class="flex w-50">
                <p class="flex"> {{ __('Validity:') }}</p>
                <p class="font-semibold ml-5 mb-2 flex">
                    {{ $record->validity }}
                </p>
            </div>
        </div>
        <br>
        <p class="flex w-100">{{ __('Basic Information of Owner:') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th>{{ __('Serial No.') }}</th>
                <th>{{ __('Name and Name of Father/Husband') }}</th>
                <th>{{ __('Rank') }}</th>
                <th>{{ __('Address') }}</th>
            </tr>
            @if($record->owner_info && $langQuery === 'bn')
                @foreach(json_decode($record->owner_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $commonKeys[$key] }}</td>
                        <td class="text-center">{{ $info->name }}</td>
                        <td class="text-center">{{ $info->rank }}</td>
                        <td class="text-center">{{ $info->address }}</td>
                    </tr>
                @endforeach
            @else
                @foreach(json_decode($record->owner_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $commonKeysen[$key] }}</td>
                        <td class="text-center">{{ $info->name }}</td>
                        <td class="text-center">{{ $info->rank }}</td>
                        <td class="text-center">{{ $info->address }}</td>
                    </tr>
                @endforeach
            @endif

        </table>
        <br>
        <p class="flex w-100">{{ __('Location of Institution:') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th>{{ __('Serial No.') }}</th>
                <th>{{ __('Mouza Name') }}</th>
                <th>{{ __('Spot No') }}</th>
                <th>{{ __('Khatian') }}</th>
                <th>{{ __('Amount of Land') }}</th>
            </tr>
            @if($record->location_of_institute_info)
                @foreach(json_decode($record->location_of_institute_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $locationOfInstituteInfoKeys[$key] }}</td>
                        <td class="text-center">{{ $info->mouza_name }}</td>
                        <td class="text-center">{{ $info->spot_no }}</td>
                        <td class="text-center">{{ $info->khatian_no }}</td>
                        <td class="text-center">{{ $info->amount_of_land }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br>
        <td class="text-center">{{ __('5.1.5) Total land area') }} {{ $record->total_land_amount }} ({{ __('acres') }})</td>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.4) Name and address of allotting agency if allotted:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->alotting_agency }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.5) Either gas has been used previously or is being used currently in this land:') }}</p>
                <p class="font-semibold mb-2">
                    {{ __($gasConnectionPreExistsList[$record->gas_connection_pre_exists] ?? '') }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p>  {{ __('5.6) Description of aboved mentioned gas connection:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->mentioned_gas_connection }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('5.6.1) Customer Code:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->customer_code }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('5.6.2) Factory or the Institution Name:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->agency_institute_name }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.6.3) Name of Owner Agency:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->agency_owner_name }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.6.4) Connection Status:') }}</p>
                <p class="font-semibold mb-2">
                    {{ __($connection_statuses[$record->connection_status] ?? '') }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.6.5) NOC for Bill Payment:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->noc_for_payment }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.7.1) Gas Supply Is Connected:') }}</p>
                <p class="font-semibold mb-2">
                    {{ __($isConnected[$record->is_connected] ?? '') }}
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('5.7.2) Name Customer Code of Institution:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->pre_existing_customer_code }}
                </p>
            </div>
        </div>
        <br>
        <p class="flex w-100">{{ __('Product Information:') }}</p> <br>
        <p class="flex"> {{ __('6.1.1) Annual raw material used:') }}</p>
        <table class="table-auto w-full">
            <tr>
                <th rowspan="2">{{ __('Serial') }}</th>
                <th rowspan="2">{{ __('Name of Finished Product') }}</th>
                <th rowspan="2">{{ __('Annual Production') }}</th>
                <th colspan="2">{{ __('Where is it sold?') }}</th>
            </tr>
            <tr>
                <th>{{ __('Local') }}</th>
                <th>{{ __('International') }}</th>
            </tr>
            @if($record->product_info)
                @foreach(json_decode($record->product_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $productInfoKeys[$key] }}</td>
                        <td class="text-center">{{ $info->name_of_finished_product }}</td>
                        <td class="text-center">{{ $info->annual_production }}</td>
                        <td class="text-center">{{ empty($info->supply_of_product_local) ? '' : __($yesNoList[$info->supply_of_product_local]) }}</td>
                        <td class="text-center">{{ empty($info->supply_of_product_international) ? '' : __($yesNoList[$info->supply_of_product_international]) }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br>
        <td class="text-center"> {{ __('6.2) Production Process:') }} </td>
        <td class="text-center"> {{ empty($record->production_process) ? '' :  __($productionProcessList[$record->production_process]) }} </td>
        <br>
        <td class="text-center"> {{ __('6.3) Production Operation Hour:') }} </td>
        <td class="text-center">
            @if(!empty($record->production_operation_hours))
                {{--                {{ $record->production_operation_hours . {{__('hours')}} }}--}}
                {{ $record->production_operation_hours }} {{ __(' hours') }}
            @endif
        </td>
        <br>
        <br>
        <p class="flex w-100">{{ __('Information on financial matters:') }}</p> <br>
        <div class="py-2 text-ellipsis overflow-auto">
            <p> {{ __('7.1) TIN No. of Institution:') }} </p>
            <p class="font-semibold mb-2">
                {{ $record->institute_tin }}
            </p>
        </div>
        <div class="py-2 text-ellipsis overflow-auto">
            <p> {{ __('7.2) VAT Registration No:') }}</p>
            <p class="font-semibold mb-2">
                {{ $record->vat_no }}
            </p>
        </div>
        <div class="py-2 text-ellipsis overflow-auto">
            <p> {{ __('7.3) Bank Solvency Certificate:') }}</p>
            <p class="font-semibold mb-2">
                @if($record->doc_bank_solvency_certificate)
                    <a href="{{ url($record->doc_bank_solvency_certificate) }}" target="_blank">
                        <img src="{{ url($record->doc_bank_solvency_certificate) }}" alt="" width="100px" height="100px">
                    </a>
                @endif
            </p>
        </div>

        <br>
        <p class="flex w-100">{{ __('Existing Gas Information') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th rowspan="3">{{ __('Serial') }}</th>
                <th colspan="5">{{ __('Gas Establishment') }}</th>
                <th colspan="5">{{ __('Type of Burner') }}</th>
            </tr>
            <tr>
                <th rowspan="2">{{ __('Name') }}</th>
                <th colspan="2">{{ __('The Manufacturer') }}</th>
                <th rowspan="2">{{ __('Size') }}</th>
                <th rowspan="2">{{ __('Production Capacity') }}</th>
                <th rowspan="2">{{ __('Type') }}</th>
                <th rowspan="2">{{ __('The Number') }}</th>
                <th rowspan="2">{{ __('Orifice') }}</th>
                <th rowspan="2">{{ __('Load') }}</th>
                <th rowspan="2">{{ __('Total Load') }}</th>
            </tr>
            <tr>
                <th>{{ __('Company') }}</th>
                <th>{{ __('Country') }}</th>
            </tr>
            @if($record->existing_gas_info)
                @foreach(json_decode($record->existing_gas_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $existingGasInfoKeys[$key] }}</td>
                        <td class="text-center">{{ $info->name_of_gas_establishment }}</td>
                        <td class="text-center">{{ $info->manufacturing_company }}</td>
                        <td class="text-center">{{ $info->country_of_manufacture }}</td>
                        <td class="text-center">{{ $info->size_of_gas_installation }}</td>
                        <td class="text-center">{{ $info->gas_production_capacity }}</td>
                        <td class="text-center">{{ $info->type_of_burner }}</td>
                        <td class="text-center">{{ $info->number_of_burner }}</td>
                        <td class="text-center">{{ $info->orifice_of_burner }}</td>
                        <td class="text-center">{{ $info->burner_load }}</td>
                        <td class="text-center">{{ $info->motload }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Hourly Gas Consumption') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->hourly_gas_consumption }}
                </p>
            </div>
        </div>
        <br>
        <p class="flex w-100">{{ __('Proposed Gas Information:') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th rowspan="3">{{ __('Serial') }}</th>
                <th colspan="5">{{ __('Gas Establishment') }}</th>
                <th colspan="5">{{ __('Type of Burner') }}</th>
            </tr>
            <tr>
                <th rowspan="2">{{ __('Name') }}</th>
                <th colspan="2">{{ __('The Manufacturer') }}</th>
                <th rowspan="2">{{ __('Size') }}</th>
                <th rowspan="2">{{ __('Production Capacity') }}</th>
                <th rowspan="2">{{ __('Type') }}</th>
                <th rowspan="2">{{ __('The Number') }}</th>
                <th rowspan="2">{{ __('Orifice') }}</th>
                <th rowspan="2">{{ __('Load') }}</th>
                <th rowspan="2">{{ __('Total Load') }}</th>
            </tr>
            <tr>
                <th>{{ __('Company') }}</th>
                <th>{{ __('Country') }}</th>
            </tr>
            @if($record->proposed_gas_info)
                @foreach(json_decode($record->proposed_gas_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $proposedGasInfoKeys[$key] }}</td>
                        <td class="text-center">{{ $info->name_of_gas_establishment }}</td>
                        <td class="text-center">{{ $info->manufacturing_company }}</td>
                        <td class="text-center">{{ $info->country_of_manufacture }}</td>
                        <td class="text-center">{{ $info->size_of_gas_installation }}</td>
                        <td class="text-center">{{ $info->gas_production_capacity }}</td>
                        <td class="text-center">{{ $info->type_of_burner }}</td>
                        <td class="text-center">{{ $info->number_of_burner }}</td>
                        <td class="text-center">{{ $info->orifice_of_burner }}</td>
                        <td class="text-center">{{ $info->burner_load }}</td>
                        <td class="text-center">{{ $info->motload }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('8.4) Quantity of gas demanded per hour: (cubic meter)') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->gas_demand_qty_hour }}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __('8.5) Desired pressure of gas:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->desired_pressure }}
                </p>
            </div>
        </div>
        <br>
        <p class="flex w-100">{{ __('When is increased gas demand required:') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th>{{ __('The Year') }}</th>
                <th>{{ __('Demand') }}</th>
                <th>{{ __('Cubic Meter') }}</th>
            </tr>
            <tr>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
        </table>
        <br>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        </tr>
        <br>
        <p class="flex w-100"> {{ __('Names and Specimen Signatures of Persons Authorized to Perform/Communicate with the Company:') }}</p> <br>
        <table class="table-auto w-full">
            <tr>
                <th>{{ __('Serial No.') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Rank') }}</th>
                <th>{{ __('Signature') }}</th>
            </tr>
            @if($record->authorizer_info)
                @foreach(json_decode($record->authorizer_info) as $key => $info)
                    <tr>
                        <td class="text-center">{{ $commonKeys[$key] }}</td>
                        <td class="text-center">{{ $info->authorizers_name }}</td>
                        <td class="text-center">{{ $info->authorizer_rank }}</td>
                        <td class="text-center">
                            @if(!is_object($info->authorizer_signature) && !empty($info->authorizer_signature) && !is_array($info->authorizer_signature))
                                <a href="{{ url($info->authorizer_signature) }}" target="_blank">
                                    <img src="{{ url($info->authorizer_signature) }}" alt="Authorizer Signature">
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p> {{ __("10) I/We hereby declare that all the information stated above and the documents attached with the application are true and correct to the best of my knowledge. We will be bound to accept the rules and regulations attached with the application form.We further agree that it shall be constructed as per the design of R.M.S and shall not make any changes thereto without the Company's permission.") }}</p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="flex items-end justify-end pr-40">
            <div>
                <p>{{ __('Name of Applicant:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->name_of_applicant }}
                </p>
            </div>
        </div>
        <div class="flex items-end justify-end pr-40">
            <div>
                <p>{{ __('Signature of Applicant:') }}</p>
                <p class="font-semibold mb-2">
                    @if($record->doc_applicant_signature)
                        <a href="{{ url($record->doc_applicant_signature) }}" target="_blank">
                            <img src="{{ url($record->doc_applicant_signature) }}" alt="Applicant Signature" width="80px" height="50px">
                        </a>
                    @endif
                </p>
            </div>
        </div>
        <div class="flex items-end justify-end pr-40">
            <div>
                <p>{{ __('Designation:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->applicant_designation }}
                </p>
            </div>
        </div>
        <div class="flex items-end justify-end pr-40">
            <div>
                <p>{{ __('ID No:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->applicant_id_no }}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Attachment: (✅)') }}</p>
                <p class="font-semibold mb-2">
                    @if($record->doc_applicant_attachment)
                        <a href="{{ url($record->doc_applicant_attachment) }}" target="_blank">
                            <img src="{{ url($record->doc_applicant_attachment) }}" alt="Attachment" width="350px" height="50px">
                        </a>
                    @endif
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Bank Name:') }}</p>
                <p class="font-semibold mb-2">
                    @if($record->payment_method && $record->payment_method_type == 1)
                        {{ $bankMfsList[$record->payment_method] }}
                    @endif
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Mobile Banking:') }}</p>
                <p class="font-semibold mb-2">
                    @if($record->payment_method && $record->payment_method_type == 2)
                        {{ $bankMfsList[$record->payment_method] }}
                    @endif
                </p>
            </div>
            <div class="py-2 text-ellipsis overflow-auto">
                <p>{{ __('Necessary information (bank information, mobile banking number etc.:') }}</p>
                <p class="font-semibold mb-2">
                    {{ $record->payment_info }}
                </p>
            </div>
        </div>
    </div>
</main>

</body>

</html>
