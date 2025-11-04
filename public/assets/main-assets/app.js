(function(){
  function qs(sel){return document.querySelector(sel)}
  function qsa(sel){return Array.from(document.querySelectorAll(sel))}

  // Toast helper using #toast
  function showToast(){
    var el = qs('#toast');
    if(!el) return;
    el.setAttribute('aria-hidden','false');
    setTimeout(function(){ el.setAttribute('aria-hidden','true') }, 1200);
  }
  window.showToast = showToast;

  // Appointment detail modal toggles (staff-upcoming)
  var aptTable = qs('#staff-apt-table');
  var aptModal = qs('#apt-detail');
  if (aptTable && aptModal) {
    aptTable.addEventListener('click', function(e){
      var tr = e.target.closest('tr');
      if(!tr) return;
      aptModal.setAttribute('aria-hidden','false');
    });
    qsa('[data-close]').forEach(function(btn){
      btn.addEventListener('click', function(){ aptModal.setAttribute('aria-hidden','true') });
    });
    var editBtn = qs('#apt-modal-edit');
    var confirmBtn = qs('#apt-modal-confirm');
    if (editBtn && confirmBtn) {
      editBtn.addEventListener('click', function(){
        ['#apt-service','#apt-date','#apt-time'].forEach(function(id){ var i = qs(id); if(i) i.disabled = false })
        confirmBtn.disabled = false;
      });
      confirmBtn.addEventListener('click', function(){ showToast(); aptModal.setAttribute('aria-hidden','true') });
    }
  }

  // Appointment page: enable edit
  var editToggle = qs('#apt-edit-toggle');
  var form = qs('#apt-form');
  if (editToggle && form) {
    editToggle.addEventListener('click', function(){
      qsa('#apt-form input, #apt-form select, #apt-save').forEach(function(el){ el.disabled = false })
    })
    if (window.__SAVED__) { showToast(); }
  }

  // Notes save button simple toast fallback
  var noteSave = qs('#note-save');
  if (noteSave) {
    noteSave.addEventListener('click', function(){ showToast(); })
  }

  // Staff Upcoming: filter today
  var filterToday = qs('#filter-today');
  if (filterToday && aptTable) {
    filterToday.addEventListener('click', function(){
      var today = new Date();
      var yyyy = today.getFullYear();
      var mm = String(today.getMonth()+1).padStart(2,'0');
      var dd = String(today.getDate()).padStart(2,'0');
      var todayStr = yyyy + '-' + mm + '-' + dd;
      Array.from(aptTable.querySelectorAll('tbody tr')).forEach(function(tr){
        var dateCell = tr.children[3];
        if (!dateCell) return;
        var text = dateCell.textContent || '';
        // Expect format like "Sep 15, 2025 - 12:00 PM"; just check yyyy
        var matches = text.match(/(\w+ \d{1,2}, (\d{4}))/);
        if (!matches) return;
        var d = new Date(matches[1]);
        var rowStr = d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0');
        tr.style.display = (rowStr === todayStr) ? '' : 'none';
      });
    });
  }

  // Inventory inline edit demo
  qsa('.inv-edit').forEach(function(btn){
    btn.addEventListener('click', function(){ /* server handles save; toast shows on redirect flag */ })
  })

  // Manage Account: edit toggle
  var profileEdit = qs('#edit-toggle');
  var profileForm = qs('#profile-form');
  if (profileEdit && profileForm) {
    profileEdit.addEventListener('click', function(){
      qsa('#profile-form input, #profile-form select').forEach(function(el){ el.disabled = false });
      var saveBtn = qs('#save-btn'); if (saveBtn) saveBtn.disabled = false;
    });
  }

  // Notes modal for Manage Account
  var openNotes = qs('#open-notes');
  var notesModal = qs('#notes-modal');
  if (openNotes && notesModal) {
    openNotes.addEventListener('click', function(){ notesModal.setAttribute('aria-hidden','false'); });
    qsa('#notes-modal [data-close]').forEach(function(btn){
      btn.addEventListener('click', function(){ notesModal.setAttribute('aria-hidden','true'); });
    });
    var notesDone = qs('#notes-done');
    if (notesDone) {
      notesDone.addEventListener('click', function(){ showToast(); notesModal.setAttribute('aria-hidden','true'); });
    }
  }

  // Show toast if server indicated save
  if (window.__SAVED__) { showToast(); }

  // Header dropdowns (notifications)
  (function(){
    var openId = null;
    function closeAll(){
      ['low-dd','near-dd'].forEach(function(id){
        var p = document.getElementById(id);
        if (p) p.hidden = true;
      });
      openId = null;
    }
    document.addEventListener('click', function(e){
      var t = e.target.closest('[data-toggle]');
      if (t) {
        e.preventDefault();
        var id = t.getAttribute('data-toggle');
        var panel = document.getElementById(id);
        if (!panel) return;
        var willOpen = panel.hidden;
        closeAll();
        if (willOpen) { panel.hidden = false; openId = id; }
        return;
      }
      // Click outside closes any open panel
      if (openId) {
        var openPanel = document.getElementById(openId);
        if (openPanel && !openPanel.contains(e.target)) {
          closeAll();
        }
      }
    });
    document.addEventListener('keydown', function(e){ if (e.key === 'Escape') closeAll(); });
  })();
})();


