import Link from "next/link"
import { Facebook, Twitter, Linkedin } from "lucide-react"

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h3 className="text-lg font-semibold mb-4">Contact Us</h3>
            <p className="mb-2">123 University Avenue, Lilongwe, Malawi</p>
            <p className="mb-2">Phone: +265 1234 5678</p>
            <p>Email: info@university.edu</p>
          </div>
          <div>
            <h3 className="text-lg font-semibold mb-4">Quick Links</h3>
            <ul className="space-y-2">
              <li>
                <Link href="/programmes" className="hover:text-primary transition-colors duration-300">
                  Programmes
                </Link>
              </li>
              <li>
                <Link href="/faq" className="hover:text-primary transition-colors duration-300">
                  FAQ
                </Link>
              </li>
              <li>
                <Link href="/privacy-policy" className="hover:text-primary transition-colors duration-300">
                  Privacy Policy
                </Link>
              </li>
              <li>
                <Link href="/scholarships" className="hover:text-primary transition-colors duration-300">
                  Scholarships
                </Link>
              </li>
            </ul>
          </div>
          <div>
            <h3 className="text-lg font-semibold mb-4">Follow Us</h3>
            <div className="flex space-x-4">
              <a href="#" className="hover:text-primary transition-colors duration-300">
                <Facebook />
              </a>
              <a href="#" className="hover:text-primary transition-colors duration-300">
                <Twitter />
              </a>
              <a href="#" className="hover:text-primary transition-colors duration-300">
                <Linkedin />
              </a>
            </div>
          </div>
        </div>
        <div className="mt-8 pt-8 border-t border-gray-700 text-center">
          <p>&copy; {new Date().getFullYear()} University Name. All rights reserved.</p>
        </div>
      </div>
    </footer>
  )
}

export default Footer

