## Table of contents

- [\ctala\Baremetrics\BareMetrics](#class-ctalabaremetricsbaremetrics)
- [\ctala\Baremetrics\BareError](#class-ctalabaremetricsbareerror)

<hr />

### Class: \ctala\Baremetrics\BareMetrics

> Description of BareMetrics

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\ctala\Baremetrics\type</em> <strong>$bearerKey</strong>, <em>bool/\ctala\Baremetrics\type</em> <strong>$sandbox=false</strong>, <em>array</em> <strong>$ops=array()</strong>)</strong> : <em>void</em> |
| public | <strong>cancelSubscription(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>, <em>array</em> <strong>$params=array()</strong>)</strong> : <em>bool</em> |
| public | <strong>checkAuth()</strong> : <em>void</em> |
| public | <strong>checkResponse()</strong> : <em>void</em> |
| public | <strong>createCharge(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>array</em> <strong>$params=array()</strong>)</strong> : <em>mixed</em> |
| public | <strong>createCustomer(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>array</em> <strong>$userData=array()</strong>)</strong> : <em>mixed</em> |
| public | <strong>createPlan(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>array</em> <strong>$ops=array()</strong>)</strong> : <em>mixed</em> |
| public | <strong>createSubscription(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>array</em> <strong>$params=array()</strong>)</strong> : <em>mixed</em> |
| public | <strong>deleteCustomer(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>deletePlan(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>deleteSubscription(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>getAccount()</strong> : <em>mixed</em> |
| public | <strong>getPlans(</strong><em>mixed</em> <strong>$sourceId</strong>)</strong> : <em>mixed</em> |
| public | <strong>listCharges(</strong><em>mixed</em> <strong>$sourceId</strong>)</strong> : <em>void</em> |
| public | <strong>listCustomerEvents(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>listCustomers(</strong><em>mixed</em> <strong>$sourceId</strong>)</strong> : <em>void</em> |
| public | <strong>listResources()</strong> : <em>void</em> |
| public | <strong>listSubscriptions(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>void</em> |
| public | <strong>setOps(</strong><em>array/\ctala\Baremetrics\type</em> <strong>$ops=array()</strong>)</strong> : <em>void</em> |
| public | <strong>showCharge(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>showCustomer(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>showSubscriptions(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>)</strong> : <em>void</em> |
| public | <strong>showSummary(</strong><em>mixed</em> <strong>$start_date=null</strong>, <em>mixed</em> <strong>$end_date=null</strong>)</strong> : <em>void</em> |
| public | <strong>updateCustomer(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$oid</strong>, <em>array</em> <strong>$userData=array()</strong>)</strong> : <em>void</em> |
| public | <strong>updateSubscription(</strong><em>mixed</em> <strong>$sourceId</strong>, <em>mixed</em> <strong>$subscriptionOid</strong>, <em>mixed</em> <strong>$planOid</strong>, <em>array</em> <strong>$planParams=array()</strong>)</strong> : <em>void</em> |

<hr />

### Class: \ctala\Baremetrics\BareError

> Description of BareError

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\string</em> <strong>$message=`''`</strong>, <em>\integer</em> <strong>$code</strong>, <em>\Throwable</em> <strong>$previous=null</strong>, <em>mixed</em> <strong>$curl=null</strong>)</strong> : <em>void</em> |
| public | <strong>errorMessage()</strong> : <em>void</em> |

*This class extends \Exception*

*This class implements \Throwable*

