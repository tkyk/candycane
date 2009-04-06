<h2><?php e(__('label_user_new')); ?></h2>

<% labelled_tabular_form_for :user, @user, :url => { :action => "add" } do |f| %>
<%= render :partial => 'form', :locals => { :f => f } %>
<%= submit_tag l(:button_create) %>
<%= check_box_tag 'send_information', 1, true %> <%= l(:label_send_information) %>
<% end %>
