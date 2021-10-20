Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore
 
@snowfluke 
snowfluke
/
ip-calc-regex
Public
1
00
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Settings
ip-calc-regex/index.js /
@snowfluke
snowfluke fix host max, total subnet, and outrange cidr checking
Latest commit 5d9f3fc on May 30
 History
 1 contributor
164 lines (128 sloc)  4.74 KB
   
const ipCalc = (ip, cat, val) => {

	if (!/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ip)) {  
    return {errorMsg: "Invalid IP Address!"}  
	}
  
  const result = {
    "IP Address": ip,
    "Netmask": "",
    "CIDR": "",
    "Wildcard": "",
    "Class": "",
    "Network Address": "",
    "Host min": "",
    "Host max": "",
    "Broadcast": "",
    "Total Subnets": "",
    "Total Hosts": ""
  }
  
	if(cat == 0 && !/^(((255\.){3}(255|254|252|248|240|224|192|128|0+))|((255\.){2}(255|254|252|248|240|224|192|128|0+)\.0)|((255\.)(255|254|252|248|240|224|192|128|0+)(\.0+){2})|((255|254|252|248|240|224|192|128|0+)(\.0+){3}))$/.test(val)){
		return {errorMsg: "Invalid Netmask!"}
	}
  
  if(cat == 1 && !/\b([1-9]|[12][0-9]|3[0-2])\b/.test(val)) return {errorMsg: "Invalid CIDR!"}
  if(cat == 2 && !/^[1-9]\d*$/.test(val)) return {errorMsg: "Invalid Host number!"}

  const classify = ip => {
    if (ip < 128) return "Class A"
    if (ip < 192) return "Class B"
    if (ip < 224) return "Class C"
    if (ip < 240) return "Class D"
    if (ip < 256) return "Class E"
  }

  const ipArr = result["IP Address"].split('.')
  result.Class = classify(ipArr[0])
  
  const MAX_BIT = 32
  const MAX_BIN = 255
  const BITS_32 = 4294967295

  const classifyCIDR = cidr => {
    if (cidr < 16) return 0
    if (cidr < 24) return 1
    if (cidr < 32) return 2
  }

  const unpackInt = i => -1 << (MAX_BIT - i);
  const intToQdot = i => [
    i >> 24 & MAX_BIN,
    i >> 16 & MAX_BIN,
    i >> 8 & MAX_BIN,
    i & MAX_BIN
  ].join('.');

  const hostPerSubnet = cidr => cidr >= 2 ? 
    (Math.pow(2, (MAX_BIT - cidr))) - 2 
    : cidr;
  const usableHost = (hostTotal) => 2 <= hostTotal ? 
    hostTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") 
    : 0;

  const qdotToInt = ip => {
    let x = 0;
  
    x += +ip[0] << 24 >>> 0;
    x += +ip[1] << 16 >>> 0;
    x += +ip[2] << 8 >>> 0;
    x += +ip[3] >>> 0;
  
    return x;
  }

  const getNetworkAddress = (ipBit, netmaskBit) => intToQdot(ipBit & netmaskBit);
  const getBroadcastAddress = (ipBit, netmaskBit) => intToQdot(ipBit | (~netmaskBit & BITS_32));

  if(cat == 0) {
    result.Netmask = val
    result.CIDR = val
      .split('.')
      .reduce((acc, cur) => (acc << 8 | cur) >>> 0)

    result.CIDR -= (result.CIDR >>> 1) & 0x55555555;
    result.CIDR = (result.CIDR & 0x33333333) + (result.CIDR >>> 2 & 0x33333333);
  
    result.CIDR = ((result.CIDR + (result.CIDR >>> 4) & 0xF0F0F0F) * 0x1010101) >>> 24;
    result["Total Hosts"] = usableHost(hostPerSubnet(result.CIDR))
  }

  if(cat == 1) {
    result.CIDR = val
    result.Netmask = intToQdot(unpackInt(val))
    result["Total Hosts"] = usableHost(hostPerSubnet(result.CIDR))
  }

  if(cat == 2) {
    result.CIDR = MAX_BIT - Math.ceil(Math.log(val) / Math.log(2))
    result.Netmask = intToQdot(unpackInt(val))
    result["Total Hosts"] = usableHost(hostPerSubnet(result.CIDR))
  }

  let CIDRclass = classifyCIDR(result.CIDR)
  const outRangeMsg = { errorMsg: "IP Address and Netmask/CIDR out of range!"}

  if(result.Class === "Class A" && CIDRclass != 0) return outRangeMsg
  if(result.Class === "Class B" && CIDRclass != 1) return outRangeMsg
  if(result.Class === "Class C" && CIDRclass != 2) return outRangeMsg

  const netmaskArr = result.Netmask.split('.')

  const ipBit = qdotToInt(ipArr)
  const netmaskBit = qdotToInt(netmaskArr)

  result.Wildcard = intToQdot(~netmaskBit)

  result["Network Address"] = getNetworkAddress(ipBit, netmaskBit)
  result.Broadcast = getBroadcastAddress(ipBit, netmaskBit)

  const networkInc = result["Network Address"].split('.')
  const broadcastDec = result.Broadcast.split('.')

  networkInc[3] = +networkInc[3] + 1;
  broadcastDec[3] = +broadcastDec[3] - 1;

  result["Host min"] = networkInc.join('.')
  result["Host max"] = broadcastDec.join('.')

  const subnetBlockTotal = () => {
    if(result.Class === "Class A"){
      let pow =
      parseInt(netmaskArr[1], 10).toString(2) +
      parseInt(netmaskArr[2], 10).toString(2) +
      parseInt(netmaskArr[3], 10).toString(2)
      pow = pow.split('').filter( el => el != 0).length
      return Math.pow(2, pow)
    }

    if(result.Class === "Class B"){
      let pow =
      parseInt(netmaskArr[1], 10).toString(2) +
      parseInt(netmaskArr[2], 10).toString(2) 
      pow = pow.split('').filter( el => el != 0).length
      return Math.pow(2, pow)
    }

    if(result.Class === "Class C"){
      let pow =
      parseInt(netmaskArr[3], 10).toString(2)
      pow = pow.split('').filter( el => el != 0).length
      return Math.pow(2, pow)
    }

    return 0
  }

  result["Total Subnets"] = subnetBlockTotal()
    
  result.CIDR = '/'+result.CIDR
  
  return result
}

module.exports.ipCalc = ipCalc;
