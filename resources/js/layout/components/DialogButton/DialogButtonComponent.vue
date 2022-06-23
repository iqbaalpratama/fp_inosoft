<template>
  <v-dialog v-model="dialog" persistent max-width="600px">
    <template v-slot:activator="{ on, attrs }">
      <v-btn v-bind="attrs" v-on="on" text>
        <slot name="button"> <v-icon left>mdi-delete</v-icon>Button </slot>
      </v-btn>
    </template>
    <slot name="default">
      <v-card>
        <v-card-title class="text-center">
          <slot name="form-title">
            <span class="text-h5 text-center">Title</span>
          </slot>
        </v-card-title>

        <v-card-text>
          <slot name="form-body">
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-subheader
                    style="height: 20px; font-size: 0.75rem; padding: 0"
                  >
                    Cancelled By
                  </v-subheader>
                  <h4>Winata Admin</h4>
                </v-col>
                <v-col cols="12">
                  <v-subheader
                    style="height: 20px; font-size: 0.75rem; padding: 0"
                  >
                    Description
                  </v-subheader>
                  <v-textarea
                    readonly
                    outlined
                    name="input-7-4"
                    background-color="grey lighten-5"
                  ></v-textarea>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-subheader
                    style="height: 20px; font-size: 0.75rem; padding: 0"
                  >
                    Attachment
                  </v-subheader>
                  <v-file-input label="File input"></v-file-input>
                </v-col>
              </v-row>
            </v-container>
          </slot>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Close
          </v-btn>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </slot>
  </v-dialog>
</template>

<script>
export default {
    name: 'DialogButton',
    data() {
        return{
            dialog: false
        }
    }
}
</script>

<style></style>
