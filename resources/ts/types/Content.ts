type Content = {
  content_id: number
  content_name: string
  content_image: string | undefined
  content_url: string
  is_one_account: boolean
  is_paid_subscription: boolean
  created_at: Date
  updated_at: Date
}

export { Content }
