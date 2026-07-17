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
  extendsFrom: 'RecordView',

  initialize: function (options) {
    this._super('initialize', [options]);
    this.context.on('button:sync_external:click', this.syncExternal, this);
  },

  syncExternal: function () {
    var url = app.api.buildURL('Accounts', 'sync', {
      id: this.model.get('id'),
    });

    app.api.call(
      'create',
      url,
      {},
      {
        success: function () {
          app.alert.show('sync-ok', {
            level: 'success',
            messages: app.lang.get('LBL_SYNC_SUCCESS', 'Accounts'),
            autoClose: true,
          });
        },
        error: function (err) {
          app.error.handleHttpError(err);
        },
      },
    );
  },
});
