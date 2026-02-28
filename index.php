<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pulse · meaningful connections</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, sans-serif;
      background: #f5f7fa;
      color: #1e293b;
      height: 100vh;
      overflow: hidden;
    }
    nav {
      display: flex; justify-content: space-between; align-items: center;
      padding: 16px 32px; 
      background: white;
      border-bottom: 1px solid #e2e8f0;
      position: fixed; width: 100%; top: 0; z-index: 100;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }
    .logo {
      font-weight: 700; font-size: 1.6rem; 
      color: #0f172a;
      letter-spacing: -0.5px;
    }
    .logo span {
      color: #3b82f6;
    }
    .nav-links a {
      color: #475569; text-decoration: none; margin-left: 32px;
      font-size: 0.95rem; font-weight: 500; cursor: pointer;
      transition: all 0.2s;
      padding: 8px 16px;
      border-radius: 40px;
    }
    .nav-links a:hover {
      background: #f1f5f9;
      color: #0f172a;
    }
    .screen { display: none; height: 100vh; width: 100vw; padding-top: 80px; background: #f5f7fa; overflow-y: auto; }
    .active { display: block; }

    /* preference card - clean and modern */
    .pref-container { 
      display: flex; align-items: center; justify-content: center; 
      min-height: calc(100vh - 80px); padding: 20px;
    }
    .pref-card {
      background: white;
      border-radius: 32px; 
      padding: 2.5rem 2.5rem;
      max-width: 550px; width: 100%; 
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
      border: 1px solid #e2e8f0;
    }
    .pref-card h1 { 
      font-size: 2.2rem; 
      font-weight: 700; 
      margin-bottom: 0.25rem;
      color: #0f172a;
    }
    .pref-card .sub { 
      color: #64748b; 
      margin-bottom: 2rem;
      font-size: 1rem;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 1.2rem;
    }
    .pref-label { 
      font-weight: 600; 
      margin: 1.5rem 0 0.6rem 0; 
      color: #334155;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .toggle-row { display: flex; gap: 10px; flex-wrap: wrap; }
    .toggle-option {
      background: white; 
      border: 1.5px solid #e2e8f0; 
      border-radius: 40px;
      padding: 12px 24px; 
      font-weight: 500; 
      color: #475569; 
      cursor: pointer;
      transition: all 0.2s; 
      flex: 1 0 auto; 
      text-align: center;
      font-size: 0.95rem;
    }
    .toggle-option.selected { 
      background: #0f172a; 
      border-color: #0f172a; 
      color: white; 
    }
    select, input {
      width: 100%; padding: 14px 20px; border-radius: 40px; border: none;
      background: white; color: #1e293b; font-size: 0.95rem;
      border: 1.5px solid #e2e8f0; margin: 6px 0 10px;
      font-family: 'Inter', sans-serif;
    }
    select:focus, input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .primary-btn {
      background: #0f172a;
      color: white; padding: 16px 28px; border-radius: 40px;
      font-weight: 600; font-size: 1rem; width: 100%; border: none;
      margin-top: 2rem; 
      cursor: pointer;
      transition: all 0.2s;
      letter-spacing: 0.3px;
    }
    .primary-btn:hover {
      background: #1e293b;
    }

    /* main page with clean cards */
    .main-grid { 
      padding: 24px 16px 30px; 
      max-width: 1200px; 
      margin: 0 auto; 
    }
    .profile-grid { display: flex; flex-direction: column; gap: 30px; }

    .profile-card {
      background: white;
      border-radius: 28px; 
      padding: 22px 22px 26px;
      box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.08); 
      border: 1px solid #e2e8f0;
    }

    .profile-header {
      display: flex; justify-content: space-between; align-items: baseline;
      margin-bottom: 16px; padding: 0 4px;
    }
    .profile-name { 
      font-size: 1.8rem; 
      font-weight: 650; 
      color: #0f172a;
    }
    .profile-location { 
      color: #64748b; 
      font-weight: 500;
      font-size: 1rem;
    }

    /* 2x3 grid */
    .photo-grid-6 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      padding: 8px 0 16px;
    }
    .photo-grid-6 .photo-item {
      width: 100%;
      aspect-ratio: 3/4;
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid #e2e8f0;
      background: #f1f5f9;
    }
    .photo-grid-6 .photo-item img {
      width: 100%; height: 100%; object-fit: cover; display: block;
      transition: filter 0.3s;
    }
    .photo-grid-6 .photo-item.blurred img {
      filter: blur(10px);
    }

    .action-buttons {
      display: flex; justify-content: center; gap: 40px; margin-top: 12px; padding: 8px 0;
    }
    .circle-lg {
      width: 68px; height: 68px; border-radius: 50%; 
      background: white;
      display: flex; align-items: center; justify-content: center;
      font-size: 2rem; 
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05); 
      cursor: pointer;
      border: 1.5px solid #e2e8f0; 
      transition: all 0.2s;
    }
    .circle-lg.pass { 
      color: #ef4444; 
    }
    .circle-lg.like { 
      background: #3b82f6; 
      color: white; 
      border-color: #3b82f6;
    }
    .circle-lg:active { transform: scale(0.92); }

    /* Payment Modal - clean white card */
    .payment-modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 500px;
      background: white;
      border-radius: 32px;
      padding: 2.5rem;
      box-shadow: 0 40px 70px -15px rgba(0, 0, 0, 0.2);
      border: 1px solid #e2e8f0;
      z-index: 1000;
      display: none;
      animation: modalFade 0.3s ease-out;
    }

    @keyframes modalFade {
      from {
        opacity: 0;
        transform: translate(-50%, -45%);
      }
      to {
        opacity: 1;
        transform: translate(-50%, -50%);
      }
    }

    .payment-modal h2 {
      font-size: 1.8rem;
      margin-bottom: 0.25rem;
      color: #0f172a;
    }

    .payment-modal .sub {
      color: #64748b;
      margin-bottom: 2rem;
      font-size: 0.95rem;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 1rem;
    }

    .price-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
      margin-bottom: 25px;
    }

    .price-option {
      background: #f8fafc;
      border: 1.5px solid #e2e8f0;
      border-radius: 24px;
      padding: 20px 12px;
      text-align: center;
      cursor: pointer;
      transition: all 0.2s;
    }

    .price-option:hover {
      border-color: #3b82f6;
      background: #f1f5f9;
    }

    .price-option.selected {
      border-color: #3b82f6;
      background: #eff6ff;
    }

    .price-days {
      font-size: 1.2rem;
      font-weight: 600;
      color: #334155;
      margin-bottom: 5px;
    }

    .price-amount {
      font-size: 1.8rem;
      font-weight: 700;
      color: #0f172a;
    }

    .payment-form {
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 600;
      color: #475569;
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .form-control {
      width: 100%;
      padding: 14px 18px;
      border-radius: 40px;
      border: 1.5px solid #e2e8f0;
      background: white;
      color: #1e293b;
      font-size: 0.95rem;
      font-family: 'Inter', sans-serif;
    }

    .form-control:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .till-display {
      text-align: center;
      background: #f8fafc;
      padding: 20px;
      border-radius: 24px;
      margin: 20px 0;
      border: 1.5px solid #e2e8f0;
    }

    .till-label {
      font-size: 0.9rem;
      color: #64748b;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .till-amount {
      font-size: 2.2rem;
      font-weight: 700;
      color: #0f172a;
    }

    .response-message {
      padding: 16px;
      border-radius: 20px;
      margin: 20px 0;
      display: none;
      text-align: center;
      font-size: 0.95rem;
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
      gap: 8px;
      background: #f1f5f9;
      color: #334155;
      padding: 10px 24px;
      border-radius: 40px;
      font-weight: 500;
      margin: 15px 0;
      font-size: 0.95rem;
    }

    .payment-instructions {
      background: #f8fafc;
      border-radius: 24px;
      padding: 20px;
      margin-top: 20px;
      border: 1px solid #e2e8f0;
    }

    .instruction-step {
      display: flex;
      align-items: center;
      margin-bottom: 12px;
      padding-bottom: 12px;
      border-bottom: 1px dashed #e2e8f0;
    }

    .instruction-step:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border-bottom: none;
    }

    .step-number {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #0f172a;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .close-modal {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 1.5rem;
      cursor: pointer;
      color: #94a3b8;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background: #f1f5f9;
      transition: all 0.2s;
    }

    .close-modal:hover {
      background: #e2e8f0;
      color: #0f172a;
    }

    .success-section {
      text-align: center;
      padding: 20px;
    }

    .success-icon {
      font-size: 3.5rem;
      color: #22c55e;
      margin-bottom: 15px;
    }

    /* lock screen - clean */
    .lock-screen { 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      min-height: calc(100vh - 80px); 
    }
    .lock-card { 
      background: white; 
      padding: 3rem; 
      border-radius: 32px; 
      max-width: 450px; 
      text-align: center;
      border: 1px solid #e2e8f0;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .lock-card h2 { color: #0f172a; margin: 1rem 0; }
    .lock-card p { color: #64748b; }

    .notification-toast {
      position: fixed; top: 100px; left: 50%; transform: translateX(-50%);
      background: #0f172a;
      color: white;
      padding: 12px 32px; 
      border-radius: 60px;
      font-weight: 500; 
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2); 
      z-index: 2000; 
      display: none;
      white-space: nowrap;
      font-size: 0.95rem;
    }

    .info-panel { 
      max-width: 500px; 
      margin: 100px auto; 
      text-align: center; 
      background: white; 
      padding: 3rem; 
      border-radius: 32px; 
      border: 1px solid #e2e8f0;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .info-panel h2 { 
      color: #0f172a;
      margin-bottom: 1rem;
    }

    /* modal overlay */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(4px);
      z-index: 999;
      display: none;
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo">pulse<span>.</span></div>
    <div class="nav-links">
      <a onclick="showScreen('pref')">home</a>
      <a onclick="showScreen('about')">about</a>
      <a onclick="showScreen('contact')">contact</a>
    </div>
  </nav>

  <div id="notif" class="notification-toast"></div>
  <div id="modalOverlay" class="modal-overlay"></div>

  <!-- PREFERENCE SCREEN - clean and modern -->
  <div id="pref" class="screen active">
    <div class="pref-container">
      <div class="pref-card">
        <h1>join pulse</h1>
        <div class="sub">tell us your preferences</div>

        <div class="pref-label">i am</div>
        <div class="toggle-row" id="userGenderRow">
          <span class="toggle-option" data-value="man">man</span>
          <span class="toggle-option" data-value="woman">woman</span>
          <span class="toggle-option" data-value="nonbinary">non‑binary</span>
        </div>

        <div class="pref-label">interested in</div>
        <div class="toggle-row" id="interestedRow">
          <span class="toggle-option" data-value="men">men</span>
          <span class="toggle-option" data-value="women">women</span>
          <span class="toggle-option" data-value="everyone">everyone</span>
        </div>

        <div class="pref-label">your age</div>
        <input type="number" id="agePref" min="18" max="99" value="28" placeholder="enter your age">

        <div class="pref-label">looking for people from</div>
        <select id="countryDesired">
          <?php
          $countries = ["Brazil", "Colombia", "Poland", "Mexico", "Philippines", "Thailand", "Ukraine", "Italy", "Spain", "Argentina", "Portugal", "Vietnam", "Romania", "Greece", "Kenya", "Morocco"];
          foreach($countries as $country) {
              echo "<option value=\"$country\">$country</option>";
          }
          ?>
        </select>

        <button class="primary-btn" onclick="showMainWithBlur()">continue →</button>
      </div>
    </div>
  </div>

  <!-- MAIN PAGE with blurred images -->
  <div id="main" class="screen">
    <div class="main-grid" id="mainGridContainer"></div>
  </div>

  <!-- PAYMENT MODAL - Clean white card -->
  <div id="paymentModal" class="payment-modal">
    <span class="close-modal" onclick="closePaymentModal()">✕</span>
    <h2>unlock full access</h2>
    <div class="sub">choose a plan to see all profiles</div>
    
    <div class="price-grid">
      <?php
      $price_plans = [
        ["days" => 1, "amount" => 120, "label" => "1 day"],
        ["days" => 3, "amount" => 200, "label" => "3 days"],
        ["days" => 8, "amount" => 350, "label" => "8 days"],
        ["days" => "unlimited", "amount" => 800, "label" => "unlimited"]
      ];
      
      foreach($price_plans as $plan) {
          $days_value = is_numeric($plan['days']) ? $plan['days'] : "'" . $plan['days'] . "'";
          echo '<div class="price-option" onclick="selectPlan(' . $days_value . ', ' . $plan['amount'] . ')">';
          echo '<div class="price-days">' . $plan['label'] . '</div>';
          echo '<div class="price-amount">Ksh ' . $plan['amount'] . '</div>';
          echo '</div>';
      }
      ?>
    </div>

    <!-- Payment Form -->
    <div id="paymentForm" class="payment-form" style="display: none;">
      <div class="form-group">
        <label class="form-label">selected plan: <span id="selectedPlanDisplay"></span></label>
      </div>

      <div class="form-group">
        <label class="form-label" for="paymentPhone">M-Pesa number</label>
        <input type="tel" class="form-control" id="paymentPhone" placeholder="07XX XXX XXX">
      </div>

      <div class="till-display">
        <div class="till-label">amount to pay</div>
        <div class="till-amount" id="paymentAmount">Ksh 0</div>
      </div>

      <div id="stkResponse" class="response-message"></div>

      <div style="text-align: center;">
        <div id="paymentStatusBadge" class="status-badge">
          <i class="fas fa-circle"></i> ready
        </div>
      </div>

      <button class="primary-btn" id="payNowBtn" onclick="processPayment()">
        pay now
      </button>

      <div class="payment-instructions">
        <div class="instruction-step">
          <span class="step-number">1</span>
          <span>confirm your number</span>
        </div>
        <div class="instruction-step">
          <span class="step-number">2</span>
          <span>click pay now</span>
        </div>
        <div class="instruction-step">
          <span class="step-number">3</span>
          <span>enter M-Pesa PIN</span>
        </div>
      </div>
    </div>

    <!-- Success Section -->
    <div id="successSection" style="display: none;">
      <div class="success-icon">✓</div>
      <h3 style="color: #0f172a; margin-bottom: 10px;">payment successful!</h3>
      <p style="color: #475569; margin-bottom: 20px;">you now have <span id="accessDays"></span> access</p>
      <button class="primary-btn" onclick="unlockProfiles()">start browsing →</button>
    </div>
  </div>

  <!-- LOCK SCREEN -->
  <div id="lock" class="screen lock-screen">
    <div class="lock-card">
      <h1 style="font-size: 2.5rem;">🔒</h1>
      <h2>preview limit reached</h2>
      <p style="margin-bottom: 2rem;">unlock 50+ more profiles</p>
      <button class="primary-btn" onclick="showPaymentModal()">unlock now</button>
    </div>
  </div>

  <!-- about & contact -->
  <div id="about" class="screen info-panel">
    <h2>about pulse</h2>
    <p style="color:#475569;">a space for genuine connections. meet people who share your interests.</p>
  </div>
  <div id="contact" class="screen info-panel">
    <h2>contact</h2>
    <p style="color:#475569;">hello@pulse.com</p>
    <p style="color:#475569;">© <?php echo date("Y"); ?> pulse. All rights reserved.</p>
  </div>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
  
  <script>
    // API Configuration
    const NYOTA_API_SECRET = '<?php echo "9609e9527bf83db6a8a16626"; ?>';

    // State
    let selectedPlan = null;
    let selectedAmount = null;
    let paymentCompleted = false;
    let userPrefs = {};

    // ----- preference toggle (visual) -----
    const userGenderOpts = document.querySelectorAll('#userGenderRow .toggle-option');
    const interestedOpts = document.querySelectorAll('#interestedRow .toggle-option');
    function clearSelected(group) { group.forEach(opt => opt.classList.remove('selected')); }
    userGenderOpts.forEach(opt => opt.addEventListener('click', () => { clearSelected(userGenderOpts); opt.classList.add('selected'); }));
    interestedOpts.forEach(opt => opt.addEventListener('click', () => { clearSelected(interestedOpts); opt.classList.add('selected'); }));

    // default
    window.addEventListener('load', () => {
      userGenderOpts[1]?.classList.add('selected');
      interestedOpts[0]?.classList.add('selected');
    });

    // Show main with blurred images and payment modal
    window.showMainWithBlur = function() {
      const age = document.getElementById('agePref').value;
      const desiredCountry = document.getElementById('countryDesired').value;
      
      if (!age || !desiredCountry) {
        alert("please fill all fields to continue");
        return;
      }

      // Store preferences
      userPrefs = {
        age: age,
        country: desiredCountry,
        interest: document.querySelector('#interestedRow .toggle-option.selected')?.getAttribute('data-value') || 'women'
      };

      // Generate and render profiles with blurred images
      renderMainPageWithBlur();
      
      // Show main screen
      showScreen('main');
      
      // Show payment modal
      setTimeout(() => {
        showPaymentModal();
      }, 500);
    }

    // Render main page with blurred images
    function renderMainPageWithBlur() {
      const container = document.getElementById('mainGridContainer');
      const profiles = generatePeople(6);

      let html = '<div class="profile-grid">';
      profiles.forEach((p, idx