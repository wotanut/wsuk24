<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Competition Results</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <header>
        <h1>Manage Competition Results</h1>
        <a href="{{url('/dashboard')}}" class="button">Back to Dashboard</a>
    </header>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main>
        <form method="POST" action="/competitor/add" id="competition-form">
            @csrf
            @method('POST')
            <label for="competitor-name">Competitor Name</label>
            <input
                type="text"
                id="competitor-name"
                placeholder="Jane Doe"
                required
            />

            <label for="competitor-member">Member Country or Region</label>
            <select id="competitor-member" required>
                <option value="">Select Member Country or Region</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BH">Kingdom of Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BT">Bhutan</option>
                <option value="BR">Brazil</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="KH">Cambodia</option>
                <option value="CA">Canada</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CO">Colombia</option>
                <option value="CR">Costa Rica</option>
                <option value="HR">Croatia</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DO">Dominican Republic</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GR">Greece</option>
                <option value="HK">Hong Kong, China</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran</option>
                <option value="IE">Ireland</option>
                <option value="IL">Israel</option>
                <option value="IT">South Tyrol, Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KR">Korea</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LV">Latvia</option>
                <option value="LR">Liberia</option>
                <option value="LI">Principality of Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao, China</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MT">Malta</option>
                <option value="MU">Mauritius</option>
                <option value="MX">Mexico</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MA">Morocco</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NL">Netherlands</option>
                <option value="NZ">New Zealand</option>
                <option value="NG">Nigeria</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PS">Palestine</option>
                <option value="PY">Paraguay</option>
                <option value="PH">Philippines</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="QA">Qatar</option>
                <option value="RO">Romania</option>
                <option value="RU">Russia</option>
                <option value="SA">Saudi Arabia</option>
                <option value="RS">Serbia</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="ZA">South Africa</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="TW">Chinese Taipei</option>
                <option value="TZ">Tanzania</option>
                <option value="TH">Thailand</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Türkiye</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States of America</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="ZM">Zambia</option>
            </select>

            <label for="skill">Skill</label>
            <select id="skill" required>
                <option value="">Select Skill</option>

                @foreach($skills as $skill)
                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                @endforeach
            </select>

            <label for="score">Score</label>
            <input
                type="number"
                id="score"
                placeholder="Score"
                min="0"
                max="100"
                required
            />

            <button type="submit">Add Result</button>
        </form>

        <table id="results-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Member</th>
                <th>Skill ID</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>
                            {{ $result->name }}
                        </td>
                        <td>
                            {{ $result->country_code }}
                        </td>
                        <td>
                            {{ $result->skill_id  }}
                        </td>
                        <td>
                            {{ $result->score }}
                        </td>
                        <td>
                            <form method="POST" action="/competitor/{{$result->id}}/delete">
                                @csrf
                                <button type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $results->links() }}

    </main>
</div>
</body>
</html>
