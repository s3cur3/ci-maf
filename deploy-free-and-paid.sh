#!/bin/sh


PAID="ci-modern-accounting-firm.zip"
FREE="ci-modern-accounting-firm-free.zip"

scp 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$PAID $PAID
scp 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$FREE $FREE

PAID_METADATA="ci-modern-accounting-firm-free_version_metadata.json"
FREE_METADATA="ci-modern-accounting-firm_version_metadata.json"

scp 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$PAID_METADATA $PAID_METADATA
scp 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$FREE_METADATA $FREE_METADATA
