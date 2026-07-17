/*
 * Copyright (C) Amaiza LLC. - All Rights Reserved
 *
 * This source code is proprietary and confidential and protected under
 * international copyright law. All rights reserved and protected by
 * the copyright holders. This file is only available to authorized individuals
 * with the permission of the copyright holders. Unauthorized copying of this file,
 * via any medium is strictly prohibited. If you encounter this file and do not have
 * permission, please contact the copyright holders and delete this file.
 *
 */

({
  extendsFrom: 'BaseView',
  className: 'schedulers-kickoff-content-view',
  template: 'kickoff-content',

  events: {
    'click [data-action=submit-kickoff]': 'submitKickoff',
  },

  initialize: function (options) {
    this._super('initialize', [options]);
    this.loading = true;
  },

  loadData: function (options) {
    var self = this;
    var url = app.api.buildURL('JobQueue', 'kickoffOptions');

    app.api.call('read', url, null, {
      success: function (data) {
        self.kickoffChoices = data.records || [];
        self.loading = false;
        self.render();

        if (options && options.success) {
          options.success();
        }
      },
      error: function (err) {
        self.loadError = err.message || 'Load failed';
        self.loading = false;
        self.render();
      },
    });
  },

  submitKickoff: function (event) {
    event.preventDefault();

    // Call the JobQueue kickoff API here.
  },
});
