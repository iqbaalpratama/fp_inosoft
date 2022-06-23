export default {
    invoice: {
        headers: [
            {
                text: 'Instruction ID',
                align: 'start',
                sortable: true,
                value: 'instruction_id',
                class:'secondary white--text'
            },
            { text: 'Link To', value: 'link',
            class:'secondary white--text' },
            { text: 'Intruction Type', value: 'intruction_type',
            class:'secondary white--text' },
            { text: 'Assigned Vendor', value: 'assigned_vendor',
            class:'secondary white--text' },
            { text: 'Attention Of', value: 'attention_of',
            class:'secondary white--text' },
            { text: 'Quotation No', value: 'quotation_no',
            class:'secondary white--text' },
            { text: 'Customer PO', value: 'customer_po_no',
            class:'secondary white--text' },
            { text: 'Status', value: 'status',
            class:'secondary white--text' },
            
            
        ],
        invoice_detail: [
            {
                instruction_id: 'SI-2022-0001',
                link_to: "INSP-2020-0001",
                intruction_type: "SI",
                assigned_vendor: "Amarit & Associates Logistic Co Ltd",
                attention_of: "Rigrep Transportation",
                quotation_no: "MITME-ADL-001",
                customer_po: "PO01",
                status: "complete"

            },
            {
                instruction_id: 'SI-2022-0002',
                link_to: "INSP-2020-0002",
                intruction_type: "SI",
                assigned_vendor: "Alphatrans Pte. Ltd",
                attention_of: "Rigrep Transportation",
                quotation_no: "MITME-ADL-001",
                customer_po: "PO01",

            },
        ],
    }
}
