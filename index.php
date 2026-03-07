<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pulse · meaningful connections</title>
  <!-- Google Fonts & Font Awesome -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #1e293b;
      height: 100vh;
      overflow: hidden;
    }

    nav {
      display: flex; justify-content: space-between; align-items: center;
      padding: 12px 24px;
      background: white;
      position: fixed; width: 100%; top: 0; z-index: 100;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .logo {
      font-weight: 700; font-size: 1.4rem;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .nav-links a {
      color: #4a5568; text-decoration: none; margin-left: 24px;
      font-size: 0.9rem; font-weight: 500; cursor: pointer;
      padding: 6px 16px;
      border-radius: 30px;
      transition: all 0.2s;
    }

    .nav-links a:hover {
      background: #f0f4ff;
      color: #667eea;
    }

    .screen { display: none; height: 100vh; width: 100vw; padding-top: 70px; overflow-y: auto; }
    .active { display: block; }

    /* preference card - clean and compact */
    .pref-container { 
      display: flex; align-items: center; justify-content: center; 
      min-height: calc(100vh - 70px); padding: 16px;
    }

    .pref-card {
      background: white;
      border-radius: 28px;
      padding: 2rem;
      max-width: 500px; width: 100%;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .pref-card h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 0.2rem;
      color: #1e293b;
    }

    .pref-card .sub {
      color: #64748b;
      margin-bottom: 1.5rem;
      font-size: 0.9rem;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 1rem;
    }

    .pref-label {
      font-weight: 600;
      margin: 1.2rem 0 0.6rem 0;
      color: #334155;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .pref-label i {
      color: #667eea;
      font-size: 0.9rem;
    }

    .toggle-row {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .toggle-option {
      background: white;
      border: 1.5px solid #e2e8f0;
      border-radius: 30px;
      padding: 8px 16px;
      font-weight: 500;
      color: #4a5568;
      cursor: pointer;
      transition: all 0.2s;
      flex: 1 0 auto;
      text-align: center;
      font-size: 0.85rem;
    }

    .toggle-option:hover {
      border-color: #667eea;
    }

    .toggle-option.selected {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-color: transparent;
      color: white;
    }

    select, input[type="number"] {
      width: 100%;
      padding: 10px 16px;
      border-radius: 30px;
      border: 1.5px solid #e2e8f0;
      background: white;
      font-size: 0.9rem;
      font-family: 'Inter', sans-serif;
    }

    select:focus, input[type="number"]:focus {
      outline: none;
      border-color: #667eea;
    }

    .primary-btn {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 12px 24px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 0.95rem;
      width: 100%;
      border: none;
      margin-top: 1.5rem;
      cursor: pointer;
      transition: all 0.2s;
    }

    .primary-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px -5px #667eea;
    }

    .primary-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    /* main page cards - more compact */
    .main-grid {
      padding: 16px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .profile-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 16px;
    }

    .profile-card {
      background: white;
      border-radius: 20px;
      padding: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .profile-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }

    .profile-name {
      font-size: 1.3rem;
      font-weight: 600;
      color: #1e293b;
    }

    .profile-location {
      color: #64748b;
      font-size: 0.8rem;
      background: #f1f5f9;
      padding: 4px 10px;
      border-radius: 30px;
    }

    .photo-grid-6 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 6px;
      margin: 12px 0;
    }

    .photo-item {
      aspect-ratio: 3/4;
      border-radius: 12px;
      overflow: hidden;
      background: #f1f5f9;
    }

    .photo-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .photo-item.blurred img {
      filter: blur(6px);
    }

    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 12px;
    }

    .circle-lg {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      cursor: pointer;
      border: 1.5px solid #e2e8f0;
      transition: all 0.2s;
    }

    .circle-lg.pass {
      color: #f56565;
    }

    .circle-lg.like {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
    }

    .circle-lg:hover {
      transform: scale(1.05);
    }

    /* Payment Modal - clean and compact */
    .payment-modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 420px;
      background: white;
      border-radius: 28px;
      padding: 1.8rem;
      box-shadow: 0 30px 60px rgba(0,0,0,0.2);
      z-index: 1000;
      display: none;
      max-height: 85vh;
      overflow-y: auto;
    }

    .payment-modal h2 {
      font-size: 1.6rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 0.2rem;
    }

    .payment-modal .sub {
      color: #64748b;
      font-size: 0.85rem;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 1rem;
      margin-bottom: 1.2rem;
    }

    .price-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
      margin-bottom: 1.2rem;
    }

    .price-option {
      background: #f8fafc;
      border: 1.5px solid #e2e8f0;
      border-radius: 16px;
      padding: 14px 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.2s;
    }

    .price-option:hover {
      border-color: #667eea;
    }

    .price-option.selected {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-color: transparent;
    }

    .price-option.selected .price-days,
    .price-option.selected .price-amount {
      color: white;
    }

    .price-days {
      font-size: 0.9rem;
      font-weight: 600;
      color: #334155;
      margin-bottom: 4px;
    }

    .price-amount {
      font-size: 1.2rem;
      font-weight: 700;
      color: #1e293b;
    }

    /* clean phone input */
    .phone-input-group {
      display: flex;
      align-items: center;
      border: 1.5px solid #e2e8f0;
      border-radius: 30px;
      overflow: hidden;
      margin: 8px 0 4px;
    }

    .country-code-select {
      background: #f8fafc;
      border: none;
      padding: 10px 12px;
      font-weight: 500;
      color: #334155;
      outline: none;
      border-right: 1.5px solid #e2e8f0;
      font-size: 0.85rem;
      min-width: 90px;
    }

    .phone-input-group input {
      flex: 1;
      padding: 10px 12px;
      border: none;
      outline: none;
      font-size: 0.9rem;
    }

    .till-display {
      background: #f8fafc;
      border-radius: 20px;
      padding: 16px;
      margin: 16px 0;
      text-align: center;
      border: 1.5px solid #e2e8f0;
    }

    .till-label {
      font-size: 0.75rem;
      color: #64748b;
      margin-bottom: 4px;
      letter-spacing: 0.3px;
    }

    .till-amount {
      font-size: 2rem;
      font-weight: 700;
      color: #667eea;
    }

    .response-message {
      padding: 12px;
      border-radius: 20px;
      margin: 12px 0;
      text-align: center;
      font-size: 0.85rem;
      display: none;
    }

    .response-message.success {
      background: #f0fdf4;
      color: #166534;
      border: 1px solid #86efac;
    }

    .response-message.error {
      background: #fef2f2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #f1f5f9;
      color: #334155;
      padding: 6px 16px;
      border-radius: 30px;
      font-weight: 500;
      font-size: 0.8rem;
      margin: 8px 0;
    }

    .payment-instructions {
      background: #f8fafc;
      border-radius: 20px;
      padding: 16px;
      margin-top: 16px;
    }

    .instruction-step {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 8px;
      padding-bottom: 8px;
      border-bottom: 1px dashed #e2e8f0;
      font-size: 0.85rem;
    }

    .instruction-step:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border-bottom: none;
    }

    .step-number {
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 0.8rem;
    }

    .close-modal {
      position: absolute;
      top: 16px;
      right: 20px;
      font-size: 1.3rem;
      cursor: pointer;
      color: #94a3b8;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background: #f1f5f9;
    }

    .close-modal:hover {
      background: #e2e8f0;
      color: #1e293b;
    }

    .success-section {
      text-align: center;
      padding: 20px;
    }

    .success-icon {
      font-size: 3rem;
      color: #22c55e;
      margin-bottom: 12px;
    }

    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.4);
      backdrop-filter: blur(4px);
      z-index: 999;
      display: none;
    }

    .notification-toast {
      position: fixed;
      top: 80px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      color: #1e293b;
      padding: 10px 24px;
      border-radius: 40px;
      font-weight: 500;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      z-index: 2000;
      display: none;
      border: 1px solid #667eea;
      font-size: 0.85rem;
    }

    .info-panel {
      background: white;
      border-radius: 28px;
      padding: 2rem;
      max-width: 450px;
      margin: 80px auto;
      text-align: center;
    }

    .selected-badge {
      background: #f0f4ff;
      padding: 4px 12px;
      border-radius: 30px;
      font-size: 0.85rem;
      color: #667eea;
      font-weight: 600;
      display: inline-block;
      margin-left: 8px;
    }

    /* remove excessive icons */
    .fa-circle, .fa-clock, .fa-exclamation-circle {
      font-size: 0.7rem;
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo">pulse.</div>
    <div class="nav-links">
      <a onclick="showScreen('pref')">home</a>
      <a onclick="showScreen('about')">about</a>
      <a onclick="showScreen('contact')">contact</a>
    </div>
  </nav>

  <div id="notif" class="notification-toast"></div>
  <div id="modalOverlay" class="modal-overlay" onclick="closePaymentModal()"></div>

  <!-- PREFERENCE SCREEN -->
  <div id="pref" class="screen active">
    <div class="pref-container">
      <div class="pref-card">
        <h1>find your spark</h1>
        <div class="sub">let's get to know you</div>

        <div class="pref-label"><i class="fas fa-user"></i> i am</div>
        <div class="toggle-row" id="userGenderRow">
          <span class="toggle-option" data-value="man">man</span>
          <span class="toggle-option" data-value="woman">woman</span>
          <span class="toggle-option" data-value="nonbinary">non‑binary</span>
        </div>

        <div class="pref-label"><i class="fas fa-heart"></i> interested in</div>
        <div class="toggle-row" id="interestedRow">
          <span class="toggle-option" data-value="men">men</span>
          <span class="toggle-option" data-value="women">women</span>
          <span class="toggle-option" data-value="everyone">everyone</span>
        </div>

        <div class="pref-label"><i class="fas fa-calendar"></i> your age</div>
        <input type="number" id="agePref" min="18" max="99" value="28" placeholder="enter your age">

        <div class="pref-label"><i class="fas fa-globe"></i> looking in</div>
        <div class="country-select-wrapper">
          <select id="countryDesired">
            <option value="" disabled selected>select a country</option>
            <option value="Brazil">🇧🇷 Brazil</option>
            <option value="Colombia">🇨🇴 Colombia</option>
            <option value="Kenya">🇰🇪 Kenya</option>
            <option value="South Africa">🇿🇦 South Africa</option>
            <option value="Nigeria">🇳🇬 Nigeria</option>
            <option value="Philippines">🇵🇭 Philippines</option>
            <option value="Thailand">🇹🇭 Thailand</option>
            <option value="Mexico">🇲🇽 Mexico</option>
          </select>
        </div>

        <button class="primary-btn" onclick="showMainWithBlur()">continue</button>
      </div>
    </div>
  </div>

  <!-- MAIN PAGE with real women photos -->
  <div id="main" class="screen">
    <div class="main-grid" id="mainGridContainer"></div>
  </div>

  <!-- PAYMENT MODAL - Clean and compact -->
  <div id="paymentModal" class="payment-modal">
    <span class="close-modal" onclick="closePaymentModal()">✕</span>
    <h2>unlock access</h2>
    <div class="sub">choose a plan to see all profiles</div>

    <div class="price-grid" id="priceGrid"></div>

    <!-- Payment Form -->
    <div id="paymentForm" style="display: none;">
      <div style="margin-bottom: 12px;">
        <span class="selected-badge"><span id="selectedPlanDisplay">⚡ 1 day</span></span>
      </div>

      <!-- Phone input -->
      <div class="pref-label">your number</div>
      <div class="phone-input-group">
        <select class="country-code-select" id="countryCode">
          <option value="254" selected>🇰🇪 +254</option>
          <option value="255">🇹🇿 +255</option>
          <option value="256">🇺🇬 +256</option>
        </select>
        <input type="tel" id="paymentPhone" placeholder="712345678">
      </div>

      <div class="till-display">
        <div class="till-label">amount to pay</div>
        <div class="till-amount" id="paymentAmount">Ksh 120</div>
      </div>

      <div id="stkResponse" class="response-message"></div>

      <div style="text-align: center;">
        <div id="paymentStatusBadge" class="status-badge">
          <span>●</span> ready
        </div>
      </div>

      <button class="primary-btn" id="payNowBtn" onclick="processPayment()">
        pay now · Ksh <span id="payAmount">120</span>
      </button>

      <div class="payment-instructions">
        <div class="instruction-step">
          <span class="step-number">1</span>
          <span>confirm number</span>
        </div>
        <div class="instruction-step">
          <span class="step-number">2</span>
          <span>click pay now</span>
        </div>
        <div class="instruction-step">
          <span class="step-number">3</span>
          <span>enter PIN on phone</span>
        </div>
      </div>
    </div>

    <!-- Success Section -->
    <div id="successSection" style="display: none;" class="success-section">
      <div class="success-icon">✓</div>
      <h3 style="margin-bottom: 8px;">payment successful!</h3>
      <p style="color: #64748b; margin-bottom: 16px; font-size: 0.9rem;"><span id="accessDays"></span> access activated</p>
      <button class="primary-btn" onclick="unlockProfiles()">start browsing</button>
    </div>
  </div>

  <!-- about & contact -->
  <div id="about" class="screen info-panel">
    <h2 style="margin-bottom: 12px;">about pulse</h2>
    <p style="color:#4a5568;">where meaningful connections begin.</p>
  </div>
  <div id="contact" class="screen info-panel">
    <h2 style="margin-bottom: 12px;">contact</h2>
    <p style="color:#4a5568;">hello@pulse.com</p>
  </div>

  <script>
    // API Configuration
    const NESTLINK_API_SECRET = '8b8cf12992d2b40be762104f';
    const API_BASE = 'https://api.nestlink.co.ke';

    // State
    let selectedPlan = null;
    let selectedAmount = 120;
    let selectedDays = 1;

    // Price plans
    const plans = [
      { days: 1, amount: 120, label: '1 day', icon: '⚡' },
      { days: 3, amount: 200, label: '3 days', icon: '🔥' },
      { days: 8, amount: 350, label: '8 days', icon: '✨' },
      { days: 'unlimited', amount: 800, label: 'unlimited', icon: '💫' }
    ];

    // Real women photos (using placeholder images of women)
    const womenProfiles = [
      { name: 'Isabella', age: 24, country: 'Brazil', photos: ['https://images.unsplash.com/photo-1494790108777-385ef6eebf46?w=300', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=300'] },
      { name: 'Sofia', age: 27, country: 'Colombia', photos: ['https://images.unsplash.com/photo-1517841905240-472988babdf9?w=300', 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=300', 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?w=300'] },
      { name: 'Zahara', age: 26, country: 'Kenya', photos: ['https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=300', 'https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?w=300', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300'] },
      { name: 'Amara', age: 25, country: 'Nigeria', photos: ['https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?w=300', 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300', 'https://images.unsplash.com/photo-1554151228-14d9def656e4?w=300'] },
      { name: 'Luna', age: 28, country: 'Philippines', photos: ['https://images.unsplash.com/photo-1524508762098-fd137ff4c8ce?w=300', 'https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=300', 'https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?w=300'] },
      { name: 'Mia', age: 23, country: 'Thailand', photos: ['https://images.unsplash.com/photo-1521117187687-7a104ee3c6e5?w=300', 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=300', 'https://images.unsplash.com/photo-1491349174775-aaafddd81942?w=300'] }
    ];

    // Initialize price grid
    function initPriceGrid() {
      const grid = document.getElementById('priceGrid');
      grid.innerHTML = plans.map(plan => {
        return `
          <div class="price-option ${plan.amount === 120 ? 'selected' : ''}" onclick="selectPlan(${plan.days === 'unlimited' ? "'unlimited'" : plan.days}, ${plan.amount}, '${plan.icon} ${plan.label}')">
            <div class="price-days">${plan.label}</div>
            <div class="price-amount">Ksh ${plan.amount}</div>
          </div>
        `;
      }).join('');
    }
    initPriceGrid();

    // Set default selected
    window.addEventListener('load', () => {
      selectedPlan = '⚡ 1 day';
      document.getElementById('selectedPlanDisplay').innerText = '⚡ 1 day';
      document.getElementById('paymentAmount').innerText = 'Ksh 120';
      document.getElementById('payAmount').innerText = '120';
      document.getElementById('paymentForm').style.display = 'block';
    });

    // Screen navigation
    window.showScreen = function(screenId) {
      document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
      document.getElementById(screenId).classList.add('active');
    };

    // Preference toggles
    const userGenderOpts = document.querySelectorAll('#userGenderRow .toggle-option');
    const interestedOpts = document.querySelectorAll('#interestedRow .toggle-option');
    
    function clearSelected(group) { 
      group.forEach(opt => opt.classList.remove('selected')); 
    }
    
    userGenderOpts.forEach(opt => opt.addEventListener('click', () => { 
      clearSelected(userGenderOpts); 
      opt.classList.add('selected'); 
    }));
    
    interestedOpts.forEach(opt => opt.addEventListener('click', () => { 
      clearSelected(interestedOpts); 
      opt.classList.add('selected'); 
    }));

    // Default selections
    window.addEventListener('load', () => {
      userGenderOpts[1]?.classList.add('selected');
      interestedOpts[1]?.classList.add('selected');
    });

    // Select plan
    window.selectPlan = function(days, amount, displayLabel) {
      selectedDays = days;
      selectedAmount = amount;
      selectedPlan = displayLabel;
      
      document.querySelectorAll('.price-option').forEach(opt => opt.classList.remove('selected'));
      event.currentTarget.classList.add('selected');
      
      document.getElementById('selectedPlanDisplay').innerText = displayLabel;
      document.getElementById('paymentAmount').innerText = 'Ksh ' + amount.toLocaleString();
      document.getElementById('payAmount').innerText = amount;
      
      document.getElementById('paymentForm').style.display = 'block';
      document.getElementById('stkResponse').style.display = 'none';
      document.getElementById('paymentStatusBadge').innerHTML = '<span>●</span> ready';
    };

    // Show main with real women photos
    window.showMainWithBlur = function() {
      const age = document.getElementById('agePref').value;
      const desiredCountry = document.getElementById('countryDesired').value;

      if (!age || !desiredCountry) {
        showNotification('please fill all fields');
        return;
      }

      renderMainPageWithBlur();
      showScreen('main');
      
      setTimeout(() => {
        showPaymentModal();
      }, 500);
    };

    // Render profiles with real women photos
    function renderMainPageWithBlur() {
      const container = document.getElementById('mainGridContainer');
      
      let html = '<div class="profile-grid">';
      womenProfiles.forEach((profile, idx) => {
        html += `
          <div class="profile-card">
            <div class="profile-header">
              <span class="profile-name">${profile.name}, ${profile.age}</span>
              <span class="profile-location">${profile.country}</span>
            </div>
            <div class="photo-grid-6">
        `;
        // Create 6 photos (repeat the 3 photos to fill grid)
        for (let j = 0; j < 6; j++) {
          const photoIndex = j % 3;
          html += `
            <div class="photo-item blurred">
              <img src="${profile.photos[photoIndex]}" alt="${profile.name}">
            </div>
          `;
        }
        html += `
            </div>
            <div class="action-buttons">
              <div class="circle-lg pass" onclick="showNotification('maybe next time')"><i class="fas fa-times"></i></div>
              <div class="circle-lg like" onclick="showNotification('spark sent!')"><i class="fas fa-heart"></i></div>
            </div>
          </div>
        `;
      });
      html += '</div>';
      container.innerHTML = html;
    }

    // Modal functions
    window.showPaymentModal = function() {
      document.getElementById('paymentModal').style.display = 'block';
      document.getElementById('modalOverlay').style.display = 'block';
    };

    window.closePaymentModal = function() {
      document.getElementById('paymentModal').style.display = 'none';
      document.getElementById('modalOverlay').style.display = 'none';
    };

    // Phone formatting
    function formatPhoneForNestlink(phone, countryCode) {
      let cleaned = phone.replace(/\D/g, '');
      if (cleaned.startsWith(countryCode)) {
        cleaned = '0' + cleaned.slice(countryCode.length);
      } else if (cleaned.length === 9) {
        cleaned = '0' + cleaned;
      } else if (cleaned.length === 12 && cleaned.startsWith('254')) {
        cleaned = '0' + cleaned.slice(3);
      }
      if (!cleaned.startsWith('0')) cleaned = '0' + cleaned;
      return cleaned;
    }

    document.getElementById('paymentPhone').addEventListener('input', function(e) {
      this.value = this.value.replace(/\D/g, '');
    });

    window.unlockProfiles = function() {
      document.querySelectorAll('.photo-item').forEach(item => item.classList.remove('blurred'));
      closePaymentModal();
      showNotification('profiles unlocked!');
    };

    function showNotification(text) {
      const toast = document.getElementById('notif');
      toast.innerText = text;
      toast.style.display = 'block';
      setTimeout(() => toast.style.display = 'none', 2500);
    }

    // Process payment
    window.processPayment = async function() {
      if (!selectedAmount) {
        showNotification('please select a plan');
        return;
      }

      const phoneInput = document.getElementById('paymentPhone').value.trim();
      const countryCode = document.getElementById('countryCode').value;

      if (!phoneInput) {
        showNotification('enter your M-Pesa number');
        return;
      }

      const formattedPhone = formatPhoneForNestlink(phoneInput, countryCode);
      
      if (!/^07\d{8}$/.test(formattedPhone)) {
        showNotification('enter valid 10-digit number (07XXXXXXXX)');
        return;
      }

      const payBtn = document.getElementById('payNowBtn');
      const stkResponse = document.getElementById('stkResponse');
      const statusBadge = document.getElementById('paymentStatusBadge');

      payBtn.disabled = true;
      payBtn.innerHTML = 'sending...';
      statusBadge.innerHTML = '<span>⟳</span> sending';
      stkResponse.style.display = 'none';

      const local_id = `PULSE_${Date.now()}_${Math.floor(Math.random()*1000)}`;
      const description = `Pulse unlock - ${selectedPlan}`;

      try {
        const response = await fetch(`${API_BASE}/runPrompt`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Api-Secret': NESTLINK_API_SECRET
          },
          body: JSON.stringify({
            phone: formattedPhone,
            amount: parseInt(selectedAmount),
            local_id: local_id,
            transaction_desc: description
          })
        });

        const data = await response.json();

        if (response.ok && data.status === true) {
          stkResponse.innerHTML = `✓ STK sent! Check your phone`;
          stkResponse.className = 'response-message success';
          stkResponse.style.display = 'block';

          statusBadge.innerHTML = '<span>⌛</span> waiting';

          showNotification('check phone for M-Pesa prompt');

          setTimeout(() => {
            document.getElementById('paymentForm').style.display = 'none';
            document.getElementById('successSection').style.display = 'block';
            document.getElementById('accessDays').innerText = selectedPlan;
          }, 3000);
        } else {
          throw new Error(data.msg || 'STK push failed');
        }
      } catch (error) {
        stkResponse.innerHTML = `✗ Failed: ${error.message}`;
        stkResponse.className = 'response-message error';
        stkResponse.style.display = 'block';
        statusBadge.innerHTML = '<span>!</span> try again';
        showNotification('payment failed');
      } finally {
        payBtn.disabled = false;
        payBtn.innerHTML = 'pay now · Ksh ' + selectedAmount;
      }
    };
  </script>
</body>
</html>